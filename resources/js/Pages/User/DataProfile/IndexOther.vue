<template>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Membership Card</h5>
          <p class="card-text">Name: {{ member.name }}</p>
          <p class="card-text">Membership ID: {{ member.membershipId }}</p>
          <p class="card-text">Expiration Date: {{ member.expirationDate }}</p>
          <button class="btn btn-primary" @click="downloadCard">Download Card</button>
        </div>
      </div>
    </div>
  </template>

  <script>


  export default {
    data() {
      return {
        member: {
          name: 'John Doe',
          membershipId: 'ABC123',
          expirationDate: '31/12/2024'
        }
      };
    },
    methods: {
      downloadCard() {
        const card = this.$el.querySelector('.card');
        html2canvas(card).then(function(canvas) {
          const imgData = canvas.toDataURL('image/png');
          const link = document.createElement('a');
          link.href = imgData;
          link.download = 'membership_card.png';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
        });
      }
    }
  };
  </script>

  <style scoped>
  /* Custom styles for the card */
  .card {
    width: 300px;
    margin: 0 auto;
    margin-top: 50px;
  }
  </style>
