<?php
  echo "
      <script type=\"text/javascript\">
        function toggleCCExplore() {
          var element = document.getElementById('cc-explore'); element.classList.toggle('is-active');
        }
      </script>
  ";
?>
<header id="cc-explore" class="cc-global-header">
  <div class="container">
    <a class="open-tab" onclick="toggleCCExplore()" href="#">Explore CC</a>
    <div class="global-header-content">
      <div class="level">
        <div class="level-left">
          <header class="global-header-header">
            <a
              class="main-logo"
              href="https://creativecommons.org"
              target="_blank"
              ><div class="has-text-white">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid meet"
                  viewBox="0 0 304 73"
                >
                  <use href="#logomark"></use>
                </svg></div
            ></a>
          </header>
        </div>
      </div>
      <div class="columns padding-bottom-normal">
        <div class="column is-one-quarter">
          <aside class="donate-section">
            <h5 class="">Our work relies on you!</h5>
            <p class="">Help us keep the internet free and open.</p>
            <a
              class="button small donate"
              href="https://us.netdonor.net/page/6650/donate/1?ea.tracking.id=global-navigation-bar"
              ><i
                class="
                  icon
                  cc-letterheart
                  margin-right-small
                  is-size-5
                  padding-top-smaller
                "
              ></i
              >Donate now</a
            >
          </aside>
        </div>
        <div class="column">
          <nav
            class="products"
            role="navigation"
            aria-label="global navigation"
          >
            <div class="product-list">
              <a
                class="product-item"
                href="https://network.creativecommons.org"
                target="_blank"
                ><strong class="">Global Network</strong
                ><span class="item-description"
                  >Join a global community working to strengthen the
                  Commons</span
                ></a
              ><a
                class="product-item"
                href="https://certificate.creativecommons.org"
                target="_blank"
                ><strong class="">Certificate program</strong
                ><span class="item-description"
                  >Become an expert in creating and engaging with openly
                  licensed materials</span
                ></a
              ><a
                class="product-item"
                href="https://summit.creativecommons.org"
                target="_blank"
                ><strong class="">Global Summit</strong
                ><span class="item-description"
                  >Attend our annual event, promoting the power of open
                  licensing</span
                ></a
              ><a
                class="product-item"
                href="https://creativecommons.org/choose"
                target="_blank"
                ><strong class="">License Chooser</strong
                ><span class="item-description"
                  >Get help choosing the appropriate license for your work</span
                ></a
              ><a
                class="product-item"
                href="https://search.creativecommons.org"
                target="_blank"
                ><strong class="">CC Search</strong
                ><span class="item-description"
                  >Find openly licensed material for creative and educational
                  reuse</span
                ></a
              ><a
                class="product-item"
                href="https://opensource.creativecommons.org"
                target="_blank"
                ><strong class="">CC Open Source</strong
                ><span class="item-description"
                  >Help us build products that maximize creativity and
                  innovation</span
                ></a
              >
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
