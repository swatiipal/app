<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* body{
            background-color: #f4f7f6;
            margin-top:20px;
        } */
        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }
        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7;
            height: 100%;
            overflow-y:scroll;
        }

        .chat-app .chat {
            margin-left: 280px;
            border-left: 1px solid #eaeaea
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer
        }

        .people-list .chat-list li.active {
            background: #efefef
        }

        .people-list .chat-list li .name {
            font-size: 15px
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%
        }

        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff;
            overflow-y: scroll;
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: #efefef
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }
            .chat-app .people-list.open {
                left: 0
            }
            .chat-app .chat {
                margin: 0
            }
            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }
            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto
            }
            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto
            }
            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }
    </style>
<div class="container">
<input type="hidden" id="senderName" value="{{ Auth::user()->name }}">
<input type="hidden" id="senderId" value="{{ Auth::user()->id }}">

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <form role="form" action="{{ route('dashboard') }}" data-parsley-validate method="get">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                        </div>
                        <input type="text" name="search"
                        value="@if (isset($_REQUEST['search'])) {{ $_REQUEST['search'] }} @endif"
                        id="search" class="form-control" placeholder="Search...">
                    </div>
                </form><br>

                <h4>Chats</h4>
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    @if(isset($data))
                        @foreach($data as $key=>$value)
                            <li class="clearfix">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                                <div class="about">
                                    <div class="name" id="name">{{$value['name']}}
                                        <input type="hidden" id="participantId" class="participantId" value="{{$value['id']}}">
                                        {{-- <input type="hidden" id="chatRoomType" class="chatRoomType" value="Chats"> --}}

                                    </div>
                                    <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <hr><br>

                {{-- for space --}}
                <input type="button" id ="createSpaces"
                onclick="spaceModal()"
                class="btn btn-sm @if (empty($value['remarks'])) btn btn-outline btn-outline-dark btn-active-light-dark @else btn btn-dark @endif "
                value="Create Group">
                <br><br>

                <h4>Spaces</h4>
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    @if(isset($rooms))
                        @foreach($rooms as $key=>$value)
                            <li class="clearfix">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                                <div class="about">
                                    <div class="name" id="name">{{$value['chat_room_name']}}
                                        <input type="hidden" id="participantId" class="participantId" value="{{$value['id']}}">
                                        <input type="hidden" id="chatRoomType" class="chatRoomType" value="Spaces">

                                    </div>
                                    <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>

                
            </div>

                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0"></h6>
                                    <small></small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                            </div>
                        </div>
                    </div>  
                    <div class="chat-history">
                        <ul class="m-b-0">
                            {{-- for sender --}}
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span id="msg-send-date-time" class="message-data-time">
                                        {{-- 10:10 AM, Today --}}
                                    </span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar" style="float: right;">
                                </div>
                                <div id="messages" class="message other-message float-right"> 
                                    {{-- Hi Aiden, how are you? How is the project coming along?  --}}
                                </div>
                            </li>

                            {{-- for receiver --}}
                            <li class="clearfix">
                                <div class="message-data">
                                    <span class="message-data-time">
                                        {{-- 10:12 AM, Today --}}
                                    </span>
                                </div>
                                <div class="message my-message">
                                    {{-- Are we meeting today? --}}
                                </div>                                    
                            </li>                               
                            <li class="clearfix">
                                <div class="message-data">
                                    <span class="message-data-time">
                                        {{-- 10:15 AM, Today --}}
                                    </span>
                                </div>
                                <div class="message my-message">
                                    {{-- Project has been already finished and I have results to show you. --}}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        <form id="msgForm">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <button type="submit" class="input-group-text"><i class="fa fa-send"></i></button>
                                </div>
                                <input type="text" id="msgText" name="message" class="form-control" placeholder="Enter text here...">                                    
                            </div>
                        </form>

                    </div>
                </div>
        </div>
    </div>
</div>
{{-- popup window for space creation --}}
<div class="modal fade" tabindex="-1" id="spaceModalDiv">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Space</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            
            <div class="modal-body">
                {{-- @csrf --}}
                <div class="row">
                    <div class="col-xl-9 fv-row" style="width: 100%!important;">
                        <label for="exampleFormControlInput1"
                            class="required form-label">Group Name</label>
                        <input class="form-control form-control-solid" id="querymodelTextarea"
                            name="query" required>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <h4>Selected User Name: </h4>
                <h4 id="selectedUserNames"></h4>

                <div class="card-body p-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xl-9 fv-row" style="width: 100%!important;">
                                    <label for="exampleFormControlInput1"
                                        class="required form-label">New Group</label>
                                </div>
                                
                                <ul class="list chat-list mt-2 mb-0">
                                    @if(isset($data))
                                        @foreach($data as $key=>$value)
                                            <li class="clearfix user-item" style="padding: 10px 15px;
                                            list-style: none;
                                            border-radius: 3px;">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" style="width: 45px;
                                                border-radius: 50%; float: left; border-radius: 50%;" alt="avatar">
                                                <div class="about" style="float: left; padding-left: 8px;">
                                                    <div class="name" id="name">{{$value['name']}}
                                                        <input type="hidden" id="participant-Id" class="participant-Id" value="{{$value['id']}}">
                
                                                    </div>
                                                    <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a type="button" class="btn btn-light btn-sm btn-light"
                    data-bs-dismiss="modal">Cancel</a>
                <button type="button" class="btn btn-light btn-sm btn-light" id="createGroup" class="createGroup"
                    data-bs-dismiss="modal">Create</button>
                <input type="hidden" id="chatRoomType" class="chatRoomType" name="chatRoomType"
                    value="Spaces">
            </div>
                  
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function() {
    var selectedUserNames = [];
    var participantIds = [];

    $('.user-item').click(function(){
        var name = $(this).find('.name').text();
        var participantId = $(this).find('.participant-Id').val();

        var index = selectedUserNames.indexOf(name);
        if (index === -1) {
            selectedUserNames.push(name);
            participantIds.push(participantId);
        } else {
            selectedUserNames.splice(index, 1);
            participantIds.splice(index, 1);
        }

        updateSelectedUserNames();
    });

    $('#createGroup').click(function(){
        var groupName = $('#querymodelTextarea').val();
        var chatRoomType = $('#chatRoomType').val();

        console.log('Group Name:', groupName);
        console.log('Chat Room Type:', chatRoomType);
        console.log('Selected User Names:', selectedUserNames);
        console.log('Participant IDs:', participantIds);

        $('#spaceModalDiv').modal('hide');

        $.post('/create-spaceroom', {_token: '{{ csrf_token() }}',
            participant_id: participantIds,
            chatRoomType: chatRoomType,
            groupName: groupName
        }, (resp) => {
            console.log(resp);
        }).catch((err) => {
            console.error(err);
        });
        
        var chatHeader = document.querySelector('.chat .chat-header');
        var chatAbout = chatHeader.querySelector('.chat-about');
        var chatName = chatAbout.querySelector('h6');
        var chatLastSeen = chatAbout.querySelector('small');
        
        if (groupName.trim() !== '' && participantIds !== '') {
            chatName.textContent = groupName + '(' + selectedUserNames + ')';
            chatLastSeen.textContent = 'Last seen: ' + getTime(); 
        } else {
            chatName.textContent = 'Default Name';
            chatLastSeen.textContent = 'Last seen: Default Time'; 
        }
        
        
    });

    function updateSelectedUserNames() {
        $('#selectedUserNames').text(selectedUserNames.join(', '));
    }

    // $('.createGroup').on('submit', function (e) {
    //     alert("SDasd");
    //     e.preventDefault();
    //     // let selectedUsers = $('#selectedUserNames').val();
    //     // alert(selectedUsers);
        
    // });

    //click to fetch receiver data
    var participantIds = [];

    var liElements = document.querySelectorAll('.list-unstyled.chat-list li');
    liElements.forEach(function(liElement) {
        liElement.addEventListener('click', function(e) {
            e.preventDefault();
            
            var nameValue = this.querySelector('.name').textContent;
            var chatRoomType = $('#chatRoomType').val();
            var participantId = this.querySelector('.participantId').value;
        
            participantIds.push(participantId);
            
            $.post('/create-chatroom', {_token: '{{ csrf_token() }}',
                groupName: nameValue,
                participant_id: participantIds,
                chatRoomType: chatRoomType,

            }, (resp) => {
                console.log(resp);
            }).catch((err) => {
                console.error(err);
            });

            var chatHeader = document.querySelector('.chat .chat-header');
            var chatAbout = chatHeader.querySelector('.chat-about');
            var chatName = chatAbout.querySelector('h6');
            var chatLastSeen = chatAbout.querySelector('small');
            console.log(senderId, participantId);

            if (nameValue.trim() !== '') {
                chatName.textContent = nameValue;
                chatLastSeen.textContent = 'Last seen: ' + getTime(); 

                
            } else {
                chatName.textContent = 'Default Name';
                chatLastSeen.textContent = 'Last seen: Default Time'; 
            }

        });
    });

    

    //send messages
    // $('#msgForm').on('submit', function (e) {
    //     e.preventDefault();
    //     let message = $('#msgText').val();
    //     var senderName = $('#senderName').val();
    //     console.log(message, senderName);
    //     $.post('/message-sent', {_token: '{{ csrf_token() }}',
    //         message: message, 
    //         senderName: senderName
    //     }, (resp) => {
    //         console.log(resp);
    //         $('#msgText').val('');
    //     }).catch((err) => {
    //         console.error(err);
    //     });
    // });

    $('#msgForm').on('submit', function (e) {
        e.preventDefault();
        let message = $('#msgText').val();
        var senderName = $('#senderName').val();
        
        console.log(message, senderName, senderId, participantId);
        $.post('/message-sent', {_token: '{{ csrf_token() }}',
            message: message, 
            senderName: senderName,
            senderId: senderId,
            participantId: participantId,
            // chatRoomId: chatRoomId
            
        }, (resp) => {
            console.log(resp);
            $('#msgText').val('');
        }).catch((err) => {
            console.error(err);
        });
        
    });

    Echo.private(`chatroom.123`) 
        .listen('MessageSent', (e) => {
            // console.log("chatroom."+chatRoomId);
            console.log(e);

            if (e.hasOwnProperty('chatRoomId')) {
                let chatRoomId = e.chatRoomId;
                console.log("chatRoomId:", chatRoomId);
            } else {
                console.log("chatRoomId not present in the event data.");
            }

            $('.message.other-message.float-right').append(`<div><span class="dark:text-black">${e.text}</span></div>`);
            
        });
    
});

function spaceModal() {
    $('#spaceModalDiv').modal('show');
    // $("#querymodelTextarea").html(remarks);
}

function getTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var timeString = hours + ':' + (minutes < 10 ? '0' + minutes : minutes) + ' ' + (hours >= 12 ? 'PM' : 'AM');
    return timeString;
}

</script>
</body>
</html>