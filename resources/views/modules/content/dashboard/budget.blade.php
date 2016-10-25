<?php $i = 1; ?>

<div class="row">
    <div class="col-md-12">
        <h3>Lista de Orçamentos</h3>
        <div class="row">
          @if(count($orcamentos['request']))
            <div class="col-md-6">
                <h4>Meus Recursos</h4>
                <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
                  @foreach ($orcamentos['request'] as $budget)
                    <li>
                      <div class="collapsible-header">
                        <div class="row">
                          <div class="col-xs-1"><span class="badge" id="budget-{{ Auth::user()->id }}_{{ $budget->resource->user->id }}_{{ $budget->id }}">R</span></div>
                          <div class="col-xs-11">
                            <span class="title">{{ $budget->resource->name }}</span>
                            <div class="name">{{ $budget->user->name }}</div>
                          </div>
                          <!--<div class="col-xs-1"><i class="pull-right fa fa-paper-plane fa-2x"></i></div>-->
                        </div>
                      </div>
                      <div class="collapsible-body">
                        <span class="message">{{ $budget->message }}</span>
                        <div class="row">
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                <a class="pull-left body-btn" href="{{ $budget->file}}">LINK</a>
                              </div>
                              <div class="col-md-6">
                                <a href="#" class="answer-budget pull-right body-btn" supplier="{{ Auth::user()->id }}" requester="{{ $budget->user_id }}" budget-id="{{ $budget->id }}">RESPONDER <i class="fa fa-paper-plane"></i></a>
                              </div>
                          </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
            @if(count($orcamentos['ordered']))
            <div class="col-md-6">
                <h4>Meus Pedidos</h4>
                <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
                  @foreach ($orcamentos['ordered'] as $budget)
                    <li>
                      <div class="collapsible-header">
                        <div class="row">
                          <div class="col-xs-1"><span class="badge" id="budget-{{ $budget->resource->user->id }}_{{ Auth::user()->id }}_{{ $budget->id }}">P</span></div>
                          <div class="col-xs-11">
                            <span class="title">{{ $budget->resource->name }}</span>
                            <div class="name">{{ $budget->user->name }}</div>
                          </div>
                          <!--<div class="col-xs-1"><i class="pull-right fa fa-paper-plane fa-2x"></i></div>-->
                        </div>
                      </div>
                      <div class="collapsible-body">
                        <span class="message">{{ $budget->message }}</span>
                        <div class="row">
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                <a class="pull-left body-btn" href="{{ $budget->file}}">LINK</a>
                              </div>
                              <div class="col-md-6">
                                <a href="#" class="answer-budget pull-right body-btn" supplier="{{ $budget->resource->user->id }}" requester="{{ Auth::user()->id }}" budget-id="{{ $budget->id }}">RESPONDER <i class="fa fa-paper-plane"></i></a>
                              </div>
                          </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
            @if(!count($orcamentos['request']) && !count($orcamentos['ordered']))
              <div style="text-align: center">
                <h1 style="color: #7d7d7d; font-weight: bold; margin: 120px auto">Nenhum Orçamento</h1>
              </div>
            @endif
        </div>
    </div>
</div>

@push('posscripts')
  <script>
        var sb;
        var loggedUser;
        //Armazena a lista de 
        var globalChannelList;
        var actualChannel = null;
        var channelHandler = null;
        var scrollSize = 0;
        //Autentica no SendBird
        $(window).on('load', function() {
            sb = new SendBird({
                appId: 'D21CA9FE-72C1-43A8-A436-3A6444C94F70'
            });
            
            sb.connect({{ Auth::user()->id }}, function(usr, error) {
                if(!error){
                    loggedUser = usr;
                    console.log("Logado ao SendBird! =)");
                    sb.updateCurrentUserInfo("{{ Auth::user()->name }}", "", function(response, error) {
                      console.log(response, error);
                    });
                    window.setInterval(function(){
                      channelListQuery = sb.GroupChannel.createMyGroupChannelListQuery();
                      channelListQuery.includeEmpty = true;
                      
                      if (channelListQuery.hasNext) {
                          channelListQuery.next(function(channelList, error){
                              if (error) {
                                  console.error(error);
                              }
                              globalChannelList = channelList;
                              // for (var pos in globalChannelList) {
                              //   var channel = globalChannelList[pos];
                              //   $('#budget-' + channel.name).html(channel.unreadMessageCount);
                              // }
                              
                          });
                      }
                      if(actualChannel){
                        loadMessages();
                      }
                    }, 1000);
                }
                else{
                    console.log(error);
                    console.log("Erro ao logar no SendBird! =(");
                }
            });

        });

        var loadMessages = function(){
          var messageListQuery = actualChannel.createPreviousMessageListQuery();
          messageListQuery.load(20, true, function(messageList, error){
            if (error) {
                console.error(error);
                return;
            }
            $("#message-list").empty();
            messageList.reverse().forEach(function(e){
              addMessage(e);
            });
            var obj = $("#messages");
            if (obj.height() !== scrollSize) {
              scrollSize = obj.height();
              $("#message-scroll").animate({ scrollTop: scrollSize }, "slow");
            }
            console.log(messageList);
          });
        }
        
        var addMessage = function(e){
          var messageItem = '<li class="mar-btm">';
          if(e.sender.userId == loggedUser.userId){
            messageItem += '<div class="media-right">';
          }
          else{
            messageItem += '<div class="media-left">';
          }
          messageItem += '<img src="' + e.sender.profileUrl + '" class="img-circle img-sm" alt="Profile Picture">';
  	      messageItem += '</div>';
          if(e.sender.userId == loggedUser.userId){
              messageItem += '<div class="media-body pad-hor speech-right">';
          }
          else{
              messageItem += '<div class="media-body pad-hor">';
          }
          messageItem += '<div class="speech">';
          messageItem += '<a href="#" class="media-heading">' + e.sender.nickname +'</a>';
          messageItem += '<p>' + e.message + '</p>';
          messageItem += '<p class="speech-time">';
  				//messageItem += '<i class="fa fa-clock-o fa-fw"></i> 09:31';
  				messageItem += '</p></div></div></li>';
  		    $('#message-list').append(messageItem);
        }
        
        $(function() {
          var logged = {{ Auth::check() ? Auth::check() : 0 }};
        
            $('.answer-budget').click(function (e) {
              if (logged === 0) {
                window.location.href = "{{ route('login') }}";
              } else {
                
                var chatName = $(this).attr('supplier').concat('_',$(this).attr('requester'),'_',$(this).attr('budget-id'));
                
                //Se o chat não existe, cria
                for (var pos in globalChannelList){
                    if(globalChannelList[pos].name == chatName){
                        actualChannel = globalChannelList[pos];
                        break;
                    }
                }
                

                if(!actualChannel){
                    //Cria o canal
                    var userIds = [$(this).attr('supplier'), $(this).attr('requester')];
                    sb.GroupChannel.createChannelWithUserIds(userIds, false, chatName, "", "", function(created, error) {
                        actualChannel = created;
                        loadMessages();
                    });
                }
                else{
                  //Carrega ele
                  loadMessages();
                }
                
                $('#chat-modal').modal('show');
              }
              e.preventDefault();
            });
        });
        
        $('#chat-modal').on('hidden.bs.modal', function () {
            actualChannel = null;
        });
        
        $('#send-message').click(function(){
            var message = $('#message-text').val();
            $('#message-text').val("");
            
            actualChannel.sendUserMessage(message, "", function(message, error){
                if (error) {
                    console.error(error);
                    return;
                }
                console.log('Enviado: ' + message);
            });
            
            console.log(message);
        });
    </script>
@endpush

@include('modules.content.dashboard.chat-modal')