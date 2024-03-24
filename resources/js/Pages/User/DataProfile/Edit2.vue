<template>
  <div>
    <h2>Data Wilayah Indonesia</h2>
    <div class="select-container">
      <div class="select-wrapper">
        <label for="province-select">Provinsi:</label>
        <input type="text" id="province-select" v-model="searchProvince" @input="filterProvinces">
        <select v-model="selectedProvince" @change="updateSelectedProvince">
          <option value="">Pilih Provinsi</option>
          <option v-for="province in filteredProvinces" :key="province.id" :value="province.id">{{ province.name }}</option>
        </select>
      </div>
      <!-- Kabupaten/Kota, Kecamatan, dan Desa/Kelurahan dropdowns -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      provinces: [],
      searchProvince: '',
      selectedProvince: '',
      filteredProvinces: []
    };
  },
  methods: {
    fetchProvinces() {
      fetch(`https://randisun05.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(data => {
          this.provinces = data;
        })
        .catch(error => {
          console.error('Error fetching provinces:', error);
        });
    },
    filterProvinces() {
      if (!this.searchProvince) {
        this.filteredProvinces = this.provinces;
      } else {
        this.filteredProvinces = this.provinces.filter(province =>
          province.name.toLowerCase().includes(this.searchProvince.toLowerCase())
        );
      }
    },
    updateSelectedProvince() {
      if (!this.selectedProvince) {
        this.searchProvince = '';
      }
    }
  },
  mounted() {
    this.fetchProvinces();
  }
};
</script>

<style scoped>
.select-container {
  display: flex;
  flex-wrap: wrap;
}

.select-wrapper {
  margin-right: 20px;
  margin-bottom: 10px;
}

.form-select {
  padding: 8px;
  font-size: 16px;
  width: 250px;
}
</style>
