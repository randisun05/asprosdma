<template>
    <div class="member-card">
        <div class="card-body">
            <div class="member-photo">
                <img v-if="foto.image" :src="getImageUrl(foto.image)" alt="" />
            </div>
            <div class="valid-until">
                <span>Disahkan tanggal:</span>
                <br><strong>{{ new Date(profile.created_at).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }) }}</strong>
            </div>
        </div>
        <div class="col-md-8">
            <div class="member-details">
                <strong>{{ profile.name }}</strong>
                <br>
                <strong>{{ profile.nomember }}</strong>
            </div>
        </div>
        <div class="qr-code">
            <div v-html="qrCode"> </div>
        </div>
</div>
  </template>

<script>
export default {
  props: {
    profile: Object, // Data profile anggota
    qrCode: String, // QR Code SVG string dari parent
    foto: String,
  },
  setup() {
    // Method to get the URL of the document
    const getImageUrl = (foto) => {
      return `/storage/${foto}`;
    };

    //return form state and submit method
    return {
      getImageUrl,
    };
  },
};



</script>

  <style scoped>
  .member-card {
      position: relative;
      width: 441px;
      height: 754px;
      box-shadow: 10px 10px 10px 10px rgb(0, 0, 0, 0.5);
      background: url('/assets/images/bg-card-2.png') no-repeat center;
      background-size: cover;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      justify-content: space-between; /* Ensure space between top and bottom elements */
      align-items: center;
        overflow: hidden; /* Ensure content doesn't overflow outside card */
        justify-content: space-between; /* Ensure space between top and bottom elements */
        padding: 20px; /* Add padding for inner spacing */
        border-radius: 40px;
  }

  .card-body {
    display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  border: 0; /* Set border to 0 */
  width: 100%;
  padding: 10px;
  }



  .valid-until {
    position: absolute;
        top: 230px;
        right: 10px;
        font-size: 14px;
        color: rgb(10, 2, 56);
        writing-mode: vertical-rl;
        text-orientation: mixed;
        text-align: left;
        white-space: nowrap;
}

.member-details {
    text-align: center;
    margin: 0;
    padding: 0;
    width: 100%;
    position: absolute;
    font-size: 20px;
    right: 0;
    bottom: 7%;
    color: #000000;
}


.qr-code {
    display: flex;
    position: absolute;
    right: 12.3%;
    bottom: 16.4%;
    border: 3px solid #ccc;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.15); /* Slight shadow to give raised look */
    background: rgba(255, 255, 255, 0.8); /* Slight transparency for an emerging look */
    border-radius: 5px;

}

.member-photo {
        position: absolute;
        width: 330px;
        height: 450px; /* Set a fixed height to ensure consistent placement */
        margin: 0;
        padding: 0;
        top: 160px;
        right: 35px;
        overflow: hidden; /* Ensure the image fits within the container */
    }

.member-photo img {
    width: 100%;
        height: 100%; /* Ensure the image covers the entire container */
        object-fit: cover; /* Maintain aspect ratio and cover the container */
        border-radius: 5px;
}
</style>

<script>


</script>
