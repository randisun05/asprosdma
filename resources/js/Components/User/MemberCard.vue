<template>
    <div class="member-card">
        <div class="card-body">
            <div class="member-photo">
                <img src="/assets/images/card.png" alt="Member Photo" />
            </div>
            <div class="valid-until">
                <span>Disahkan tanggal:</span>
                <br><strong>17 April 2024</strong>
            </div>
        </div>
        <div class="col-md-8">
            <div class="member-details">
                <strong>Dhanu Sukma Utomo, S.E.</strong>
                <br>
                <strong>00009/01/ASPROSDMA</strong>
            </div>
        </div>
        <div class="qr-code">
            <img src="/assets/images/qr-card.png" alt="QR Code" />
        </div>
    </div>
  </template>

  <style scoped>
  .member-card {
      position: relative;
      width: 591px;
      height: 1004px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background: url('/assets/images/bg-card.png') no-repeat center;
      background-size: cover;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      justify-content: space-between; /* Ensure space between top and bottom elements */
      align-items: center;
        overflow: hidden; /* Ensure content doesn't overflow outside card */
  }

  .card-body {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin: 0;
  }



  .valid-until {
    font-size: 14;
    color: green;
    text-align: center;
    margin: 0;
    position: absolute;
    right: 4%;
    bottom: 2%;
}

.member-details {
    text-align: center;
    margin: 0;
    padding: 0;
    width: 100%;
    position: absolute;
    font-size: 20px;
    right: 0;
    bottom: 2%;
    color: #ffffff;
}


.qr-code {

    display: flex;
    position: absolute;
    right: 25%;
    bottom: 20%;
}

.qr-code img {
    position: absolute;
    width: 130; /* Increase the QR code size slightly */
    height: 130px;
    border: 1px solid #ccc;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.15); /* Slight shadow to give raised look */
    background: rgba(255, 255, 255, 0.8); /* Slight transparency for an emerging look */
    border-radius: 5px;

}

.member-photo {
    position: absolute;
    bottom: 10px;
    left: 10px;
    margin: 0;
    padding: 0;
    width: 580px; /* Set width of the photo */
    height: auto;
  }

  .member-photo img {
    width: 100%; /* Ensure the image fully fits the container */
    height: auto;
    border-radius: 5px;
  }
  </style>
