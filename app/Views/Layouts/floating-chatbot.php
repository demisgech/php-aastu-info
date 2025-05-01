<!-- Chatbot Toggle Button -->
<button id="chatbotToggle" class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle shadow"
    style="z-index: 1050;">

    <!-- <i class="bi bi-chat-dots"> Toggle</i> -->
    Toggle
</button>

<!-- Chatbot Window -->
<div id="chatbotWindow" class="card position-fixed bottom-0 end-0 m-4 shadow-lg"
    style="width: 300px; display: none; z-index: 1040;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Chat with us</span>
        <button type="button" class="btn-close btn-sm" aria-label="Close" onclick="toggleChatbot()"></button>
    </div>
    <div class="card-body" style="height: 200px; overflow-y: auto;">
        <p class="text-muted small">Hi 👋 How can we help you today?</p>
        <!-- Chat messages will go here -->
    </div>
    <div class="card-footer p-2">
        <form id="chatForm" onsubmit="sendMessage(event)">
            <div class="input-group">
                <input type="text" class="form-control" id="chatInput" placeholder="Type a message..." required>
                <button class="btn btn-primary" type="submit"><i class="bi bi-send"></i></button>
            </div>
        </form>
    </div>
</div>

<script>
    const chatbotToggle = document.getElementById("chatbotToggle");
    const chatbotWindow = document.getElementById("chatbotWindow");
    const chatInput = document.getElementById("chatInput");

    function toggleChatbot() {
        chatbotWindow.style.display =
            chatbotWindow.style.display === "none" ? "block" : "none";
    }

    chatbotToggle.addEventListener("click", toggleChatbot);

    function sendMessage(event) {
        event.preventDefault();
        const message = chatInput.value.trim();
        if (message !== "") {
            const body = chatbotWindow.querySelector(".card-body");
            const msg = document.createElement("div");
            msg.innerHTML = `<div class="text-end mb-2"><span class="badge bg-primary">${message}</span></div>`;
            body.appendChild(msg);
            chatInput.value = "";
            body.scrollTop = body.scrollHeight;
        }
    }

</script>