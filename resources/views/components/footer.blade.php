<div class="container py-10 bg-white">
    <div class="flex justify-between gap-10">
        <div>
            <a href="{{ route('home') }}" aria-label="To Homepage">
                <x-icons.logo aria-label="Opportuneer Logo"></x-icons.logo>
                <p class="mt-1 font-open-sans text-sm !leading-[130%] text-black">
                    Connecting Talent with Opportunity
                </p>
            </a>
        </div>

        <nav class="flex gap-10 flex-wrap" aria-label="Footer Navigation">
            <!-- Company Information -->
            <section>
                <h4 class="font-montserrat text-base font-semibold">Company Information</h4>
                <ul class="text-xs flex flex-col gap-2 mt-2">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press & Media</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </section>

            <!-- Legal Information -->
            <section>
                <h4 class="font-montserrat text-base font-semibold">Legal</h4>
                <ul class="text-xs flex flex-col gap-2 mt-2">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                    <li><a href="#">Security</a></li>
                </ul>
            </section>

            <!-- Help & Support -->
            <section>
                <h4 class="font-montserrat text-base font-semibold">Help & Support</h4>
                <ul class="text-xs flex flex-col gap-2 mt-2">
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Support Center</a></li>
                    <li><a href="#">Feedback</a></li>
                    <li><a href="#">Accessibility</a></li>
                </ul>
            </section>

            <!-- Social Media -->
            <section>
                <h4 class="font-montserrat text-base font-semibold">Social Media</h4>
                <ul class="text-xs flex flex-col gap-2 mt-2">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">LinkedIn</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </section>

            <!-- Contact Information -->
            <section>
                <h4 class="font-montserrat text-base font-semibold">Contact Info</h4>
                <address class="text-xs not-italic flex flex-col gap-2 mt-2">
                    <p>Email: <a href="#">support@opportuneer.com</a></p>
                    <p>Phone: <a href="#">+1 (123) 456-7890</a></p>
                    <p>Office Address: 123 Main St, City, Country</p>
                </address>
            </section>
        </nav>
    </div>

    <p class="mt-[76px] font-open-sans text-xs text-black/40">
        © Copyright - Jerald Bianan
    </p>
</div>
