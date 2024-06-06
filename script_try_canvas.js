const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
const savBtn = document.getElementById('saveBtn');
            var ctx = canvas.getContext('2d');
            var isDrawing = false;

            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('touchstart', startDrawingTouch);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('touchmove', drawTouch);
            canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('touchend', stopDrawing);

            function startDrawing(event) {
                isDrawing = true;
                draw(event);
            }

            function startDrawingTouch(event) {
                event.preventDefault();
                isDrawing = true;
                var touch = event.touches[0];
                var offsetX = touch.pageX - canvas.offsetLeft;
                var offsetY = touch.pageY - canvas.offsetTop;
                draw({
                    offsetX,
                    offsetY
                });
            }

            function draw(event) {
                if (!isDrawing) return;
                ctx.lineWidth = 2;
                ctx.lineCap = 'round';
                ctx.strokeStyle = '#000';
                ctx.lineTo(event.offsetX, event.offsetY);
                ctx.stroke();
                ctx.beginPath();
                ctx.moveTo(event.offsetX, event.offsetY);
            }

            function drawTouch(event) {
                event.preventDefault();
                if (!isDrawing) return;
                var touch = event.touches[0];
                var offsetX = touch.pageX - canvas.offsetLeft;
                var offsetY = touch.pageY - canvas.offsetTop;
                       ctx.lineWidth = 2;
                ctx.lineCap = 'round';
                ctx.strokeStyle = '#000';
                ctx.lineTo(offsetX, offsetY);
                ctx.stroke();
                ctx.beginPath();
                ctx.moveTo(offsetX, offsetY);
            }

            function stopDrawing() {
                isDrawing = false;
                ctx.beginPath();
            }

            var clearButton = document.getElementById('clear_signature');

            clearButton.addEventListener('click', function() {
                clearSignature();
            });

            function clearSignature() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }


            // Function to convert canvas to data URL and store it in hidden input field
            function saveSignature2() {
              const imageData = canvas.toDataURL('image/png');
              //Send imageData to PHP script process via AJAX
              const xhr = new XMLHttpRequest();
              xhr.open('POST', 'save_image.php', true);
              xhr.setRequestHeader('Contet-type', 'application/x-www-form-urlencoded');
              xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                  console.log(xhr.responseText);
                }
              };
              xhr.send('imageData=' +imageData);
            }

            // Call saveSignature() when the form is submitted
            document.querySelector('form').addEventListener('submit', saveSignature2);