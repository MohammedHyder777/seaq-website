<footer class="bg-gray-800 text-white py-6 mt-10">
  <div class="flex flex-col md:flex-row justify-evenly items-center mx-7">

    <div>
      <img src="{{ asset('images/logos/logo-reflection.png') }}" height="150" width="150" alt="شعار">
    </div>

    <div class="container mx-auto px-4 text-center md:text-end space-y-2">
      <p><i class="fa fa-location-dot text-xl"></i> العنوان: الدوحة، قطر</p>
      <p><i class="fa fa-phone text-xl"></i> الهاتف: &nbsp;&nbsp;<span dir="ltr">+974 1234 5678</span></p>
      <p><i class="fa fa-envelope text-xl"></i> البريد: &nbsp;&nbsp;info@engineers.org</p>
      <p class="text-md text-gray-400">© {{ date('Y') }} جميع الحقوق محفوظة</p>

      <!-- <p>تطوير: <b>حذق للبرمجيات</b></p> -->
    </div>
  </div>
</footer>