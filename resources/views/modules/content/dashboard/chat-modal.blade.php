<style>

.nano {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.nano>.nano-content {
    position: absolute;
    overflow: scroll;
    overflow-x: hidden;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.pad-all {
    padding: 15px;
}
.mar-btm {
    margin-bottom: 15px;
}
.media-block .media-left {
    display: block;
    float: left;
}
.img-sm {
    width: 46px;
    height: 46px;
}
.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto;
}
.pad-hor {
    padding-left: 15px;
    padding-right: 15px;
}
.speech {
    position: relative;
    background: #b7dcfe;
    color: #317787;
    display: inline-block;
    border-radius: 0;
    padding: 12px 20px;
}
.speech:before {
    content: "";
    display: block;
    position: absolute;
    width: 0;
    height: 0;
    left: 0;
    top: 0;
    border-top: 7px solid transparent;
    border-bottom: 7px solid transparent;
    border-right: 7px solid #b7dcfe;
    margin: 15px 0 0 -6px;
}
.speech-right>.speech:before {
    left: auto;
    right: 0;
    border-top: 7px solid transparent;
    border-bottom: 7px solid transparent;
    border-left: 7px solid #ffdc91;
    border-right: 0;
    margin: 15px -6px 0 0;
}
.speech .media-heading {
    font-size: 1.2em;
    color: #317787;
    display: block;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    margin-bottom: 10px;
    padding-bottom: 5px;
    font-weight: 300;
}
.speech-time {
    margin-top: 20px;
    margin-bottom: 0;
    font-size: .8em;
    font-weight: 300;
}
.media-block .media-right {
    float: right;
}
.speech-right {
    text-align: right;
}
.pad-hor {
    padding-left: 15px;
    padding-right: 15px;
}
.speech-right>.speech {
    background: #ffda87;
    color: #a07617;
    text-align: right;
}
.speech-right>.speech .media-heading {
    color: #a07617;
}

.nano>.nano-pane {
    background-color: rgba(0,0,0,0.1);
    position: absolute;
    width: 5px;
    right: 0;
    top: 0;
    bottom: 0;
    opacity: 0;
    -webkit-transition: all .7s;
    transition: all .7s;
}
</style>

<div class="modal fade" id="chat-modal" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Chat</h4>
          </div>
          <div class="modal-body">
    		<div id="demo-chat-body" class="collapse in">
    			<div class="nano has-scrollbar" style="height:500px">
    				<div id="message-scroll" class="nano-content pad-all" tabindex="0">
    				    <div id="messages" style="overflow: hidden">
    					<ul class="list-unstyled media-block" id="message-list"></ul>
    					</div>
    				</div>
    			    <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div>
    		    </div>
    		</div>
    	</div>
        <div class="modal-footer">
			<div class="row">
				<div class="col-xs-9">
					<input id="message-text" type="text" placeholder="Digite sua mensagem" class="form-control chat-input">
				</div>
				<div class="col-xs-3">
					<button class="btn btn-primary btn-block" id="send-message" type="submit">Enviar</button>
				</div>
			</div>
		</div>
      </div>
    </div>
</div>
