import Cropper from "cropperjs";

var cropper;

const elements = {
    input: document.querySelector('[data-crop="avatar"]'),
    image: document.getElementById('image'),
    button: document.getElementById('image_save'),
    preview: document.getElementById('image_preview'),
};

elements.input.addEventListener('change', (e) => {
    let file = e.target.files[0];
    let reader = new FileReader();

    if (!file.type.includes('image')) {
        return;
    }

    reader.onload = () => {
        elements.image.setAttribute('src', reader.result);

        Cropper.remove();
        Cropper.init(elements.image, {minWidth: 150, minHeight: 150});
    };
    reader.readAsDataURL(file);
});

elements.button.addEventListener('click', (e) => {
    var url;
    var canvas;

    if (cropper) {
        canvas = cropper.getCroppedCanvas();

        url = elements.image.src;

        canvas.toBlob((blob) => {
            const form = new FormData();
            const name = 'avatar.png';

            form.append('crop', blob, name);
            form.append('original', elements.input.files[0], 'original.png');

            $.ajax('/account/avatar', {
                type: 'POST',
                data: form,
                dataType: 'json',
                processData: false,
                contentType: false,
                success (r) {
                    
                },
                error (r) {
                    let response = r.responseJSON;

                    if (response.errors.crop) {
                        alert(response.errors.crop[0]);
                    }
                }
            });
        });
    }
});

Cropper.remove = () => {
    elements.preview.innerHTML = '';
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
}

Cropper.minDimensions = (options, callback) => {
    if (options.minWidth && options.minHeight && options.width < options.minHeight && options.height < options.minHeight) {
        callback.call();
    }
};

Cropper.setPreview = (event, ctx) => {
    let data = event.detail;
    let cropper = ctx.cropper;
    let imageData = cropper.getImageData();
    let getValue = value => typeof value === 'number' ? `${value}px` : value;

    let previewImage = elements.preview.getElementsByTagName('img').item(0);
    let previewWidth = elements.preview.offsetWidth;
    let imageScaledRatio = data.width / previewWidth;

    let styles = {
        width: imageData.naturalWidth / imageScaledRatio,
        height: imageData.naturalHeight / imageScaledRatio,
        marginTop: -data.y / imageScaledRatio,
        marginLeft: -data.x / imageScaledRatio,
    };

    for (let [name, value] of Object.entries(styles)) {
        if (previewImage) {
            previewImage.style[name] = getValue(value);
        }
    }
};

Cropper.init = (image, options) => {
    cropper = new Cropper(image, {
        aspectRatio: 1/1,
        viewMode: 1,
        responsive: true,
        zoomOnWheel: false,
        ready() {
            var clone = this.cloneNode();

            clone.className = '';
            clone.style.cssText = (
                'display: block;' +
                'width: 100%;' +
                'min-width: 0;' +
                'min-height: 0;' +
                'max-width: none;' +
                'max-height: none;'
            );

            elements.preview.appendChild(clone.cloneNode());
        },
        crop(event) {
            // console.info(event.detail);

            Cropper.setPreview(event, this);
            Cropper.minDimensions(Object.assign({width: event.detail.width, height: event.detail.height}, options), () => {
                cropper.setData({
                    width: options.minWidth,
                    height: options.minHeight,
                });
            });
        }
    });
}