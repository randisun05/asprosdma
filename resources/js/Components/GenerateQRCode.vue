<template>
    <div class="qr-generator">
      <h1>Generate QR Code</h1>
      <input v-model="text" placeholder="Enter text" />
      <button @click="generateQRCode">Generate QR</button>
      <div v-if="qrCode">
        <h3>QR Code Result:</h3>
        <img :src="qrCode" alt="QR Code" />
        <br />
        <a :href="qrCode" download="qr-code.png">Download QR Code</a>
      </div>
    </div>
  </template>

  <script>
  import axios from "axios";

  export default {
    data() {
      return {
        text: "",
        qrCode: null,
      };
    },
    methods: {
      async generateQRCode() {
        try {
          const response = await axios.post("http://192.168.100.168:8002/admin/generate-qr", {
            text: this.text,
          });
          // Assuming the response contains a base64 encoded QR code image
          this.qrCode = `data:image/png;base64,${response.data}`;
        } catch (error) {
          console.error("Error generating QR code:", error);
        }
      },
    },
  };
  </script>

  <style scoped>
  .qr-generator {
    text-align: center;
    margin-top: 50px;
  }
  input {
    margin-bottom: 20px;
    padding: 10px;
    width: 300px;
  }
  button {
    padding: 10px 20px;
    cursor: pointer;
  }
  img {
    margin: 20px 0;
    width: 200px;
    height: 200px;
  }
  a {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
  }
  a:hover {
    background-color: #0056b3;
  }
  </style>
