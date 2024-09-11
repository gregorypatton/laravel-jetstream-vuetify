<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EtlIndex from '@/Pages/EtlConfig/Index.vue'; // Adjust path if necessary
</script>

<template>
  <AppLayout title="Dashboard">
    <div class="py-5">
      <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <!-- Embed the Etl component -->
          <EtlIndex />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
