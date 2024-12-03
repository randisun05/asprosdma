<template>
    <div class="member-card">

    </div>
  </template>

  <style scoped>
  .member-card {
      position: relative;
      width: 441px;
      height: 754px;
      box-shadow: 10px 10px 10px 10px rgb(0, 0, 0, 0.5);
      background: url('/assets/images/kartu-anggota-belakang.png') no-repeat center;
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
    top: 20%;
  right: 0px;
  font-size: 18px;
  color: rgb(10, 2, 56);
  writing-mode: vertical-rl; /* Makes the text vertical */
  text-orientation: mixed; /* Ensures the text is upright */
  text-align: right; /* Aligns the text to the right */
}

.member-details {
    text-align: center;
    margin: 0;
    padding: 0;
    width: 100%;
    position: absolute;
    font-size: 24px;
    right: 0;
    bottom: 7%;
    color: #000000;
}


.qr-code {
    display: flex;
    position: absolute;
    right: 33.9%;
    bottom: 27.9%;
}

.qr-code img {
    position: absolute;
    width: 130; /* Increase the QR code size slightly */
    height: 130px;
    border: 1px solid #ccc;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.15); /* Slight shadow to give raised look */
    background: rgba(255, 255, 255, 0.8); /* Slight transparency for an emerging look */
    border-radius: 5px;

}

.member-photo {
    position: absolute;
    bottom: 130px;
    left: 50%;
    transform: translateX(-50%);
    margin: 0;
    padding: 0;
    width: 450px; /* Set width of the photo */
    /* max-height: 70%; Set maximum height of the photo */
    height: auto;
}

.member-photo img {
    width: 100%; /* Ensure the image fully fits the container */
    height: auto;
    border-radius: 0px;
}
</style>
