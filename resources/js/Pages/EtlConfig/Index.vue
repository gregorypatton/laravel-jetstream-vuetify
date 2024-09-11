<script lang="ts" setup>
import { ref, watch, computed } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';

// Define headers for the table
const headers = [
  { text: 'Report Type', value: 'report_type' },
  { text: 'Channel ID', value: 'channel_id' },
  { text: 'Last Run Status', value: 'last_run_status' },
  { text: 'Actions', value: 'actions' }
];

// Define props for the component
const props = defineProps({
  etlConfigs: {
    type: Object,
    required: true,
    default: () => ({
      current_page: 1,
      per_page: 10,
      total: 0,
      last_page: 1,
      data: []
    }),
  },
  isRecent: {
    type: Boolean,
    default: false
  },
});

// Define reactive pagination state with default fallback values
const options = ref({
  page: props.etlConfigs.current_page || 1,
  itemsPerPage: props.etlConfigs.per_page || 10,
});

// Refactor loadPageData to prevent page reset
const loadPageData = (newPage?: number) => {
  const routeName = props.isRecent ? 'etl_configs.recent' : 'etl_configs.index';

  router.get(route(routeName), {
    page: newPage || options.value.page,
    itemsPerPage: options.value.itemsPerPage,
  }, {
    preserveScroll: true,
    only: ['etlConfigs'],
    onSuccess: () => {
      options.value.page = newPage || props.etlConfigs.current_page;
    }
  });
};

// Watch for pagination changes and update the data accordingly
watch(() => options.value.page, (newPage) => {
  if (newPage !== props.etlConfigs.current_page) {
    loadPageData(newPage);
  }
});

watch(() => options.value.itemsPerPage, loadPageData);

// Computed properties for total items and last page
const totalItems = computed(() => props.etlConfigs.total || 0);
const lastPage = computed(() => props.etlConfigs.last_page || 1);

// Emit proper update event for pagination changes to sync with VPagination
function updatePagination(page: number) {
  options.value.page = page;
  loadPageData(page);
}
</script>

<template>
  <Head title="ETL Configs" />

  <AppLayout title="ETL Configs">
    <!-- Display total items properly -->
    <div class="mb-4">
      <p>Total Items: {{ totalItems }}</p>
    </div>

    <VDataTableServer
      :headers="headers"
      :items="etlConfigs.data"
      :server-items-length="totalItems"
      :items-per-page="options.itemsPerPage"
      :loading="false"
      v-model:options="options"
      item-value="etl_config_id"
      class="elevation-1"
    >
      <template v-slot:item.actions="{ item }">
        <!-- Adjust button size -->
        <Link :href="route('etl_configs.edit', item.etl_config_id)">
          <VBtn color="primary" icon="mdi-pencil" size="small"></VBtn>
        </Link>
        <Link :href="route('etl_configs.download', item.etl_config_id)">
          <VBtn color="secondary" icon="mdi-download" size="small"></VBtn>
        </Link>
      </template>
    </VDataTableServer>

    <!-- Fix pagination to avoid page reset and sync pagination with page number -->
    <VPagination
      v-model:page="options.page"
      :length="lastPage"
      :total-items="totalItems"
      :items-per-page="options.itemsPerPage"
      @update:modelValue="updatePagination"
    />
  </AppLayout>
</template>
