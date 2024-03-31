<template>
    <div>
      <h2>Wilayah Indonesia</h2>
      <div>
        <label for="province">Provinsi:</label>
        <input type="text" id="province" v-model="searchProvince" @input="searchProvinces" placeholder="Cari Provinsi">
        <ul v-show="showProvinceList" class="autocomplete-list">
          <li v-for="province in filteredProvinces" :key="province.id" @click="selectProvince(province)">
            {{ province.name }}
          </li>
        </ul>
      </div>

      <div>
        <label for="city">Kota/Kabupaten:</label>
        <input type="text" id="city" v-model="searchCity" @input="searchCities" placeholder="Cari Kota/Kabupaten">
        <ul v-show="showCityList" class="autocomplete-list">
          <li v-for="city in filteredCities" :key="city.id" @click="selectCity(city)">
            {{ city.name }}
          </li>
        </ul>
      </div>

      <div>
        <label for="district">Kecamatan:</label>
        <input type="text" id="district" v-model="searchDistrict" @input="searchDistricts" placeholder="Cari Kecamatan">
        <ul v-show="showDistrictList" class="autocomplete-list">
          <li v-for="district in filteredDistricts" :key="district.id" @click="selectDistrict(district)">
            {{ district.name }}
          </li>
        </ul>
      </div>

      <div>
        <label for="village">Kelurahan/Desa:</label>
        <input type="text" id="village" v-model="searchVillage" @input="searchVillages" placeholder="Cari Kelurahan/Desa">
        <ul v-show="showVillageList" class="autocomplete-list">
          <li v-for="village in filteredVillages" :key="village.id" @click="selectVillage(village)">
            {{ village.name }}
          </li>
        </ul>
      </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        provinces: [],
        cities: [],
        districts: [],
        villages: [],
        searchProvince: '',
        searchCity: '',
        searchDistrict: '',
        searchVillage: '',
        showProvinceList: false,
        showCityList: false,
        showDistrictList: false,
        showVillageList: false
      };
    },
    computed: {
      filteredProvinces() {
        return this.provinces.filter(province =>
          province.name.toLowerCase().includes(this.searchProvince.toLowerCase())
        );
      },
      filteredCities() {
        return this.cities.filter(city =>
          city.name.toLowerCase().includes(this.searchCity.toLowerCase())
        );
      },
      filteredDistricts() {
        return this.districts.filter(district =>
          district.name.toLowerCase().includes(this.searchDistrict.toLowerCase())
        );
      },
      filteredVillages() {
        return this.villages.filter(village =>
          village.name.toLowerCase().includes(this.searchVillage.toLowerCase())
        );
      }
    },
    methods: {
      searchProvinces() {
        this.showProvinceList = true;
      },
      searchCities() {
        this.showCityList = true;
      },
      searchDistricts() {
        this.showDistrictList = true;
      },
      searchVillages() {
        this.showVillageList = true;
      },
      selectProvince(province) {
        this.searchProvince = province.name;
        this.showProvinceList = false;
        // Lakukan operasi apa pun yang diperlukan saat provinsi dipilih
      },
      selectCity(city) {
        this.searchCity = city.name;
        this.showCityList = false;
        // Lakukan operasi apa pun yang diperlukan saat kota dipilih
      },
      selectDistrict(district) {
        this.searchDistrict = district.name;
        this.showDistrictList = false;
        // Lakukan operasi apa pun yang diperlukan saat kecamatan dipilih
      },
      selectVillage(village) {
        this.searchVillage = village.name;
        this.showVillageList = false;
        // Lakukan operasi apa pun yang diperlukan saat kelurahan/desa dipilih
      },
      async fetchData(url) {
        try {
          const response = await fetch(url);
          if (!response.ok) {
            throw new Error('Failed to fetch data');
          }
          return await response.json();
        } catch (error) {
          console.error('Error fetching data:', error);
        }
      },
      async fetchCitiesByProvince(provinceId) {
        const url = `https://randisun05.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`;
        this.cities = await this.fetchData(url);
      },
      async fetchDistrictsByCity(cityId) {
        const url = `https://randisun05.github.io/api-wilayah-indonesia/api/districts/${cityId}.json`;
        this.districts = await this.fetchData(url);
      },
      async fetchVillagesByDistrict(districtId) {
        const url = `https://randisun05.github.io/api-wilayah-indonesia/api/villages/${districtId}.json`;
        this.villages = await this.fetchData(url);
      }
    },
    watch: {
      searchProvince(newVal) {
        if (newVal === '') {
          this.cities = [];
          this.districts = [];
          this.villages = [];
          return;
        }
        const selectedProvince = this.provinces.find(province =>
          province.name.toLowerCase() === newVal.toLowerCase()
        );
        if (selectedProvince) {
          this.fetchCitiesByProvince(selectedProvince.id);
        }
      },
      searchCity(newVal) {
        if (newVal === '') {
          this.districts = [];
          this.villages = [];
          return;
        }
        const selectedCity = this.cities.find(city =>
          city.name.toLowerCase() === newVal.toLowerCase()
        );
        if (selectedCity) {
          this.fetchDistrictsByCity(selectedCity.id);
        }
      },
      searchDistrict(newVal) {
        if (newVal === '') {
          this.villages = [];
          return;
        }
        const selectedDistrict = this.districts.find(district =>
          district.name.toLowerCase() === newVal.toLowerCase()
        );
        if (selectedDistrict) {
          this.fetchVillagesByDistrict(selectedDistrict.id);
        }
      }
    },
    mounted() {
      const url = 'https://randisun05.github.io/api-wilayah-indonesia/api/provinces.json';
      this.fetchData(url).then(data => {
        this.provinces = data;
      });
    }
  };
  </script>

  <style>
  .autocomplete-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
    border: 1px solid #ccc;
    max-height: 200px;
    overflow-y: auto;
  }

  .autocomplete-list li {
    padding: 5px;
    cursor: pointer;
  }

  .autocomplete-list li:hover {
    background-color: #f0f0f0;
  }
  </style>
