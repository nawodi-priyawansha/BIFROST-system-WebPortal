<div class="flex flex-col">
    <!-- Fixed footer with navigation dots and arrows -->
    <div class="fixed bottom-0 left-0 right-0 flex justify-center items-center gap-2.5 p-2.5 bg-black bg-opacity-70">
        <div id="left-arrow" class="arrow w-16 md:w-20 cursor-pointer">
            <img src="{{ asset('images/previous.png') }}" alt="Previous" class="w-8 h-8 ml-8" />
        </div>
        <div class="dot w-2.5 h-2.5 bg-transparent border border-white rounded-full transition duration-300 ease-in-out cursor-pointerr"></div>
        <div class="dot w-2.5 h-2.5 bg-transparent border border-white rounded-full transition duration-300 ease-in-out cursor-pointer"></div>
        <div class="dot w-2.5 h-2.5 bg-transparent border border-white rounded-full transition duration-300 ease-in-out cursor-pointer"></div>
        <div class="dot w-2.5 h-2.5 bg-transparent border border-white rounded-full transition duration-300 ease-in-out cursor-pointer"></div>
        <div id="right-arrow" class="arrow w-16 md:w-20 cursor-pointer">
            <img src="{{ asset('images/next.png') }}" alt="Next" class="w-8 h-8" />
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dots = document.querySelectorAll('.dot');
        const leftArrow = document.getElementById('left-arrow');
        const rightArrow = document.getElementById('right-arrow');
        
        let activeIndex = 0;

        function updateDots(index) {
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('bg-transparent', 'border-white');
                    dot.classList.add('bg-white');
                } else {
                    dot.classList.remove('bg-white');
                    dot.classList.add('bg-transparent', 'border-white');
                }
            });

            // Update arrows' visibility without hiding them
            leftArrow.style.opacity = (index === 0) ? '0.5' : '1';
            rightArrow.style.opacity = (index === dots.length - 1) ? '0.5' : '1';
            leftArrow.style.pointerEvents = (index === 0) ? 'none' : 'auto';
            rightArrow.style.pointerEvents = (index === dots.length - 1) ? 'none' : 'auto';
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', function () {
                activeIndex = index;
                updateDots(index);
            });
        });

        leftArrow.addEventListener('click', function () {
            if (activeIndex > 0) {
                activeIndex--;
                updateDots(activeIndex);
            }
        });

        rightArrow.addEventListener('click', function () {
            if (activeIndex < dots.length - 1) {
                activeIndex++;
                updateDots(activeIndex);
            }
        });

        // Initial update to set correct arrow visibility
        updateDots(activeIndex);
    });
</script>
