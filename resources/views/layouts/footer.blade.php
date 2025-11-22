<footer class="bg-amber-600/80">
    <div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
        <div class="grid row-gap-10 mb-4 items-center lg:grid-cols-5">
            <div class="max-md:flex max-md:flex-col grid grid-cols-2 gap-5 row-gap-8 lg:col-span-4 xl:grid-cols-4">
                <div>
                    <p class="font-medium tracking-wide text-white">{{__('strings.our_site')}}</p>
                    <ul class="mt-2 space-y-8">
                        <li>
                            <a href="https://maps.app.goo.gl/7yqBFsxnpaGecYeY8" target="_blank" class="text-white transition-colors duration-300 hover:text-deep-purple-accent-200">
                                <i class="fa fa-location-dot text-xl"></i> {{__('strings.location_address')}}
                            </a>
                        </li>
                        <!-- Social Media for medium and wider screens -->
                        <li class="hidden md:flex flex-row justify-start gap-4 text-gray-600">
                            <a href="https://qa.linkedin.com/company/sudanese-engineers-association-qatar?trk=public_post_feed-actor-name" target="_blank"><i class="fa-brands fa-linkedin text-2xl"></i></a>
                            <a href="https://www.instagram.com/sudaneseengq" target="_blank"><i class="fa-brands fa-instagram text-2xl"></i></a>
                            <a href="https://whatsapp.com/channel/0029VaUIQwAKbYMUc9CbuJ47" target="_blank"><i class="fa-brands fa-whatsapp text-2xl"></i></a>
                            <a href="https://facebook.com/" target="_blank"><i class="fa-brands fa-facebook text-2xl"></i></a>
                            <a href="https://x.com/SudaneseEng" target="_blank"><i class="fa-brands fa-x-twitter text-2xl"></i></a>

                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-medium tracking-wide text-white">{{__('strings.contact_us')}}</p>
                    <ul class="mt-2 space-y-8">
                        <!-- <li>
                            <a href="tel:+97471580504" class="text-white transition-colors duration-300 hover:text-deep-purple-accent-200">
                                <i class="fa fa-phone text-xl"></i> <span dir="ltr">00974 123 45 678</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="mailto:info@seaq.com" class="text-white transition-colors duration-300 hover:text-deep-purple-accent-200">
                                <i class="fa fa-envelope  text-xl"></i> info@seaq.qa
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center mt-4">
                <img src="{{ asset('images/logos/logo-reflection.png') }}" height="150" width="150" alt="شعار">
                <!-- Social Media for mobile screens -->
                <li class="md:hidden flex flex-row justify-center gap-4 text-gray-600">
                    <a href="https://qa.linkedin.com/company/sudanese-engineers-association-qatar?trk=public_post_feed-actor-name" target="_blank"><i class="fa-brands fa-linkedin text-2xl"></i></a>
                    <a href="https://www.instagram.com/sudaneseengq" target="_blank"><i class="fa-brands fa-instagram text-2xl"></i></a>
                    <a href="https://whatsapp.com/channel/0029VaUIQwAKbYMUc9CbuJ47" target="_blank"><i class="fa-brands fa-whatsapp text-2xl"></i></a>
                    <a href="https://facebook.com/" target="_blank"><i class="fa-brands fa-facebook text-2xl"></i></a>
                    <a href="https://x.com/SudaneseEng" target="_blank"><i class="fa-brands fa-x-twitter text-2xl"></i></a>
                </li>
            </div>
        </div>

        <div class="flex flex-col justify-between items-center pt-5 pb-10 border-t border-gray-800 sm:flex-row">
            <div class="flex items-center gap-4 order-last me-12 mt-4 space-x-4 text-xs sm:mt-0">
                {{__('strings.developed_by')}}
                <div>
                    <a href="mailto:mohammedhyder1417@gmail.com" class="flex flex-col text-center items-center border-2 rounded-2xl pb-3">
                        <span class="m-2 font-bold text-lg" style="font-family: 'Reem Kufi';">حذق</span>
                        <span class="text-xs">للبرمجيات</span>
                    </a>
                </div>
            </div>
            <p class="text-sm text-white">
                © {{date('Y')}} {{__('strings.all_rights_reserved')}}
            </p>
        </div>
    </div>
</footer>