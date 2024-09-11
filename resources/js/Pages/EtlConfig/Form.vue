<script setup>
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { VContainer, VRow, VCol, VTextField, VBtn, VCard, VCardActions, VSnackbar } from 'vuetify/components';
import AppLayout from '@/Layouts/AppLayout.vue';

// Define props to accept `etlConfig` from Inertia
const { etlConfig } = defineProps({
  etlConfig: Object,
});

// Snackbar state for success message
const showSnackbar = ref(false);
const snackbarMessage = ref('');

// State for pagination
const page = ref(1);
const itemsPerPage = ref(10);

// State for editing vs creating
const form = useForm({
  report_type: etlConfig?.report_type || '',
  seller_id: etlConfig?.seller_id || '',
  channel_id: etlConfig?.channel_id || '',
  last_run_status: etlConfig?.last_run_status || '',
  last_run_ts: etlConfig?.last_run_ts || '',
  last_report_id: etlConfig?.last_report_id || '',
  last_report_doc: etlConfig?.last_report_doc || '',
  first_run_hr: etlConfig?.first_run_hr || '',
  freq_run_min: etlConfig?.freq_run_min || '',
});

// Watch for form success response
watch(() => form.recentlySuccessful, (value) => {
  if (value) {
    snackbarMessage.value = etlConfig?.etl_config_id ? 'ETL Config updated successfully!' : 'ETL Config created successfully!';
    showSnackbar.value = true;

    setTimeout(() => {
      window.location.href = route('etl_configs.index');
    }, 1500);
  }
});

// Submit form for creating/updating ETL config
function submitForm() {
  if (etlConfig?.etl_config_id) {
    form.put(route('etl_configs.update', { id: etlConfig.etl_config_id }));
  } else {
    form.post(route('etl_configs.store'));
  }
}
</script>

<template>
  <AppLayout :title="etlConfig?.etl_config_id ? 'Edit ETL Config' : 'Create ETL Config'">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ etlConfig?.etl_config_id ? 'Edit ETL Config' : 'Create ETL Config' }}
      </h2>
    </template>

    <div class="py-5">
      <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <VContainer>
            <VRow>
              <VCol class="mt-6">
                <VCard>
                  <form @submit.prevent="submitForm">
                    <VRow>
                      <VCol cols="12">
                        <VTextField
                          v-model="form.report_type"
                          label="Report Type"
                          :error-messages="form.errors.report_type"
                          required
                        />
                      </VCol>

                      <VCol cols="6">
                        <VTextField
                          v-model="form.seller_id"
                          label="Seller ID"
                          type="number"
                          :error-messages="form.errors.seller_id"
                          required
                        />
                      </VCol>

                      <VCol cols="6">
                        <VTextField
                          v-model="form.channel_id"
                          label="Channel ID"
                          type="number"
                          :error-messages="form.errors.channel_id"
                          required
                        />
                      </VCol>

                      <VCol cols="12">
                        <VTextField
                          v-model="form.last_run_status"
                          label="Last Run Status"
                          :error-messages="form.errors.last_run_status"
                        />
                      </VCol>

                      <VCol cols="6">
                        <VTextField
                          v-model="form.first_run_hr"
                          label="First Run Hour"
                          type="number"
                          :error-messages="form.errors.first_run_hr"
                        />
                      </VCol>

                      <VCol cols="6">
                        <VTextField
                          v-model="form.freq_run_min"
                          label="Frequency Run (Minutes)"
                          type="number"
                          :error-messages="form.errors.freq_run_min"
                        />
                      </VCol>
                    </VRow>

                    <!-- Form actions -->
                    <VCardActions class="justify-end">
                      <VBtn type="submit" color="success">
                        {{ etlConfig?.etl_config_id ? 'Update' : 'Create' }}
                      </VBtn>
                    </VCardActions>
                  </form>
                </VCard>
              </VCol>
            </VRow>

            <!-- Snackbar for success message -->
            <VSnackbar v-model="showSnackbar" :timeout="1500" color="success">
              {{ snackbarMessage }}
            </VSnackbar>
          </VContainer>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
