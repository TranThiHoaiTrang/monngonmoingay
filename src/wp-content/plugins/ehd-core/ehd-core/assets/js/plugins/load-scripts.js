!function(){var t=setTimeout(r,5e3),e=["mouseover","keydown","touchstart","touchmove","wheel"];function o(){r(),clearTimeout(t),e.forEach((function(t){window.removeEventListener(t,o,{passive:!0})}))}function r(){document.querySelectorAll("script[data-type='lazy']").forEach((function(t){t.setAttribute("src",t.getAttribute("data-src")),t.removeAttribute("data-src"),t.removeAttribute("data-type")}))}e.forEach((function(t){window.addEventListener(t,o,{passive:!0})}))}();