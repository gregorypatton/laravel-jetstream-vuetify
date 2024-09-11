<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import { VContainer, VRow, VCol, VBtn, VDataTable } from 'vuetify/components';

// Get the props passed from the server-side (Inertia)
const { etlConfigs, isRecent } = defineProps({
  etlConfigs: Array,  // The list of ETL configs
  isRecent: Boolean,  // Indicates if the current view is the "Recent" view
});

// Toggle between "All" and "Recent"
const toggleView = () => {
  if (isRecent) {
    window.location.href = route('etl_configs.index'); // Go to "All" ETL configs
  } else {
    window.location.href = route('etl_configs.recent'); // Go to "Recent" ETL configs
  }
};
</script>

<template>
  <Head title="ETL Configs" />
  <VContainer>
    <!-- Page Title -->
    <VRow>
      <VCol>
        <h1 class="text-center">ETL Config List</h1>
      </VCol>
    </VRow>

    <!-- Toggle Button to switch between All and Recent -->
    <VRow>
      <VCol class="text-center">
        <VBtn @click="toggleView" color="primary" class="mr-2">
          {{ isRecent ? 'View All ETL Configs' : 'View Recent ETL Configs' }}
        </VBtn>
      </VCol>
    </VRow>

    <!-- Main Content: Data Table for ETL Configs -->
    <VRow>
      <VCol class="mt-6">
        <VDataTable
          :headers="[
            { text: 'Report Type', value: 'report_type' },
            { text: 'Seller ID', value: 'seller_id' },
            { text: 'Channel ID', value: 'channel_id' },
            { text: 'Last Run Status', value: 'last_run_status' },
            { text: 'Actions', value: 'actions' }
          ]"
          :items="etlConfigs"
          item-value="etl_config_id"
        >
          <template v-slot:item.actions="{ item }">
            <VBtn :href="route('etl_configs.edit', { id: item.etl_config_id })" color="primary" text>
              Edit
            </VBtn>
          </template>
        </VDataTable>
      </VCol>
    </VRow>
  </VContainer>
</template>
