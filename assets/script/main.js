let img = document.querySelector(".player .cover");
let audio = document.getElementById('my-audio');

window.addEventListener('load', vibrant());

function vibrant() {
    let vibrant = new Vibrant(img);
    let swatches = vibrant.swatches()

    for (var swatch in swatches) {
        if (swatches.hasOwnProperty(swatch) && swatches[swatch]) {
            console.log(swatch, swatches[swatch].getHex())
            if (swatch == 'Vibrant') {
                console.log(swatches[swatch].getHex());
                document.querySelector(':root').style.setProperty('--highlight', swatches[swatch]
                    .getHex())
            }
        }
    }
}
