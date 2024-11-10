<script>
export default {
  name: 'app-footer-UI'
}
</script>
<template>
  <footer class="footer-basic">
    <div class="social">
      <h2>Contact me!</h2>
      <a href="https://www.instagram.com/jes.bg/"><ion-icon name="logo-instagram"></ion-icon>
</a>
      <a href="https://twitter.com/twitter"><ion-icon name="logo-twitter"></ion-icon></a>
      <a
        href="https://au.linkedin.com/in/jessica-boediono-goenawan-45102a218?trk=people-guest_people_search-card"
        ><ion-icon name="logo-linkedin"></ion-icon></a>
      <a href="mailto:103523649@student.swin.edu.au"><ion-icon name="mail-outline"></ion-icon></a>
    </div>

    <p class="copyright">Jessica B. G. © 2023</p>
  </footer>
</template>

<style>
.footer-basic {
  padding: 40px 0;
  background-color: #ffffff;
  color: #4b4c4d;
}

.footer-basic ul {
  padding: 0;
  list-style: none;
  text-align: center;
  font-size: 18px;
  line-height: 1.6;
  margin-bottom: 0;
}

.footer-basic li {
  padding: 0 10px;
}

.footer-basic ul a {
  color: inherit;
  text-decoration: none;
  opacity: 0.8;
}

.footer-basic ul a:hover {
  opacity: 1;
}

.footer-basic .social {
  text-align: center;
  padding-bottom: 25px;
}

.footer-basic .social > a {
  font-size: 24px;
  width: 40px;
  height: 40px;
  line-height: 40px;
  display: inline-block;
  text-align: center;
  border-radius: 50%;
  border: 1px solid #ccc;
  margin: 0 8px;
  color: inherit;
  opacity: 0.75;
}

.footer-basic .social > a:hover {
  opacity: 0.9;
}

.footer-basic .copyright {
  margin-top: 15px;
  text-align: center;
  font-size: 13px;
  color: #aaa;
  margin-bottom: 0;
}
</style>
