<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
html, body { height: 100%; overflow: hidden; }
.wrap { 
    margin: 8px; height: 90%; width: 50%; 
    display: flex; flex-direction: column;
}
.container {
    flex: 1 1 90%; display: flex; flex-direction: column; 
    background-color: #eee; border: 1px solid #ccc; overflow:scroll;
}
.form { flex: 0 0 32px; display: flex; border: 1px solid #ddd; }
.form > input[type=text] { flex: 1 1 auto; border: 1px solid #eee; }
.form > input[type=button] { flex: 0 0 20%; border: 1px solid #eee; }
.bubble { flex: 1 1 auto; clear: both; } /* clear the floats here on parent */
.bubble p {
    border-radius: 5px;
    padding: 8px; margin: 8px 12px;
    max-width: 80%;  /* this will make it not exceed 80% and then wrap */
    position: relative; transition: background-color 0.5s; 
}
.left p { background-color: #ccc; float: left; } /* floated left */
.right p { background-color: #33c; color: #fff; float: right; } /* floated right */
/* classes below are only for arrows, not relevant */
.left p::before {
    content: ''; position: absolute;
    width: 0; height: 0; left: -8px; top: 8px;
    border-top: 4px solid transparent;
    border-right: 8px solid #ccc;
    border-bottom: 4px solid transparent;
}
.right p::after {
    content: ''; position: absolute;
    width: 0; height: 0; right: -8px; bottom: 8px;
    border-top: 4px solid transparent;
    border-left: 8px solid #33c;
    border-bottom: 4px solid transparent;
}
  
</style> 
<div class="wrap">
    <div id="chatWindow" class="container">
        <div class="bubble left"><p>msg</p></div>
        <div class="bubble left"><p>long message</p></div>
        <div class="bubble right"><p>ultra long message which can wrap at eighty percent </p></div>
        <div class="bubble left"><p>lorem ipsum</p></div>
        <div class="bubble right"><p>very long message</p></div>    
        <div class="bubble right"><p>one more message</p></div>    
        <div class="bubble left"><p>lorem ipsum</p></div>
        <div class="bubble right"><p>another message</p></div>    
        <div class="bubble left"><p>lorem ipsum</p></div>
        <div class="bubble right"><p>yet another message</p></div>    
        <div class="bubble left"><p>lorem ipsum</p></div>
    </div>
    <div id="inputWindow" class="form">
        <input id="inp" type="text" />
        <input id="btn" type="button" value="Send" />
    </div>
</div>
<script>
    var btn 	= document.getElementById('btn'), 
    inp 	= document.getElementById('inp'), 
    chats	= document.getElementById('chatWindow')
;
btn.addEventListener('click', postMsg);

inp.addEventListener('keyup', function(e) {
	if (e.keyCode == 13) { postMsg(); }
});

function postMsg() {
	var msg 	= inp.value,
        bubble 	= document.createElement('div'),
        p 		= document.createElement('p');
    if (msg.trim().length <= 0) { return; }
    bubble.classList.add('bubble');
    bubble.classList.add('left');
    p.textContent = msg;
    bubble.appendChild(p);
    inp.value = '';
    chats.insertBefore(bubble, chats.lastChild);
    var messageBody = document.querySelector('#chatWindow');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
}
</script>