<!-- Chatbot Toggle Button -->
<button id="chatbotToggle"
    class="btn btn-primary position-fixed bottom-0 end-0 mb-3 me-4 rounded-circle shadow-lg d-flex align-items-center justify-content-center"
    style="z-index: 1050; width: 60px; height: 60px;" onclick="toggleChatbot()">
    💬
</button>

<!-- Chatbot Window -->
<div id="chatbotWindow" class="card position-fixed end-0 mb-5 me-4 shadow-lg border-0 rounded-4"
    style="bottom: 50px; width: 90%; max-width: 420px; height: 60%; display: none; z-index: 1040; overflow: hidden; flex-direction: column;">

    <!-- Header -->
    <div
        class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4 px-3 py-2">
        <strong>Chat with us</strong>
        <button type="button" class="btn btn-sm btn-light rounded-circle p-1" aria-label="Close"
            onclick="toggleChatbot()">✖</button>
    </div>

    <!-- Chat Body -->
    <div class="card-body bg-light" style="flex: 1; overflow-y: auto;">
        <p class="text-muted small">👋 Hi there! How can we assist you today?</p>
    </div>

    <!-- Footer -->
    <div class="card-footer bg-white p-2 border-top">
        <form id="chatForm" onsubmit="sendMessage(event)">
            <div class="input-group">
                <input type="text" class="form-control rounded-start-pill" id="chatInput"
                    placeholder="Type a message..." required>
                <button class="btn btn-primary rounded-end-pill px-3" type="submit">📩</button>
            </div>
        </form>
    </div>
</div>

<!-- <script>
    function toggleChatbot() {
        const chatbot = document.getElementById("chatbotWindow");
        if (chatbot.style.display === "none") {
            chatbot.style.display = "flex";
            chatbot.animate([{ opacity: 0, transform: "translateY(30px)" }, { opacity: 1, transform: "translateY(0)" }], {
                duration: 300,
                easing: "ease-out"
            });
        } else {
            chatbot.animate([{ opacity: 1, transform: "translateY(0)" }, { opacity: 0, transform: "translateY(30px)" }], {
                duration: 200,
                easing: "ease-in"
            }).onfinish = () => {
                chatbot.style.display = "none";
            };
        }
    }

    function sendMessage(event) {
        event.preventDefault();
        const input = document.getElementById("chatInput");
        const message = input.value.trim();
        if (message) {
            const body = document.querySelector("#chatbotWindow .card-body");
            const msgElem = document.createElement("div");
            msgElem.className = "text-end mb-2";
            msgElem.innerHTML = `<span class="badge bg-primary">${message}</span>`;
            body.appendChild(msgElem);
            input.value = "";
            body.scrollTop = body.scrollHeight;
        }
    }
</script> -->

<script>
    function toggleChatbot() {
        const chatbot = document.getElementById("chatbotWindow");
        if (chatbot.style.display === "none") {
            chatbot.style.display = "flex";
            chatbot.animate([{ opacity: 0, transform: "translateY(30px)" }, { opacity: 1, transform: "translateY(0)" }], {
                duration: 300,
                easing: "ease-out"
            });
        } else {
            chatbot.animate([{ opacity: 1, transform: "translateY(0)" }, { opacity: 0, transform: "translateY(30px)" }], {
                duration: 200,
                easing: "ease-in"
            }).onfinish = () => {
                chatbot.style.display = "none";
            };
        }
    }

    function sendMessage(event) {
        event.preventDefault();
        const input = document.getElementById("chatInput");
        const message = input.value.trim();
        const body = document.querySelector("#chatbotWindow .card-body");

        if (message) {
            // User Message
            const userMsg = document.createElement("div");
            userMsg.className = "text-end mb-2";
            userMsg.innerHTML = `<span class="badge bg-primary px-3 py-2">${message}</span>`;
            body.appendChild(userMsg);

            input.value = "";
            body.scrollTop = body.scrollHeight;

            // Simulated Bot Response (you can replace with real API later)
            setTimeout(() => {
                const botMsg = document.createElement("div");
                botMsg.className = "d-flex align-items-start mb-3";
                botMsg.innerHTML = `
                <div class="me-2">
                    <div class="bg-secondary text-white px-3 py-2 rounded-pill">
                        Thank you for your message. We'll get back to you shortly!
                    </div>
                </div>
            `;
                body.appendChild(botMsg);
                body.scrollTop = body.scrollHeight;
            }, 800);
        }
    }
</script>