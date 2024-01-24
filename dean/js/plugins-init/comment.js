let commentsData = [];
let comment_index = 0;
var selectedId;
var sessionID = document.getElementById('session_id').value;
loadComments();

    function loadComments() {
        commentsData = [];
        comment_index = 0;
        var loadComments = new XMLHttpRequest();
        loadComments.open("GET", "load.comment.php");
        loadComments.send();
        loadComments.onload = function() {
            var commentJSON = JSON.parse(this.responseText);
            commentJSON.forEach((value) => {
                var comment = { 
                    comments_id: value['research_topic_id'],
                    text: value['comment'], 
                    replies: [], 
                    index: comment_index,
                    date_sent: value['date_sent'],
                    id: value['id'],
                    user: value['user'],
                    userID: value['userID'],
                    pic: value['image_path']
                };
                commentsData.unshift(comment);
                renderComments2(value['research_topic_id']);
                comment_index++;
            });
        }
    }
    
    function setId(value) {
        selectedId = value;
    }

    function addComment() {
    const commentText = document.getElementById(`commentText_${selectedId}`).value;
    if (commentText) {
        var storeComment = new XMLHttpRequest();
        storeComment.open("GET", "store.comment.php?id="+selectedId+"&comment="+commentText);
        storeComment.send();
        storeComment.onload = function() {
            loadComments();
        }// Add the new comment at the beginning of the array
        
        document.getElementById(`commentText_${selectedId}`).value = '';
        comment_index++;
    }
}


    function addReply(commentIndex, comment_index) {
        const reply_text = document.getElementById(`reply_text_${comment_index}`).value;
        const reply = { text: reply_text };
        commentsData[commentIndex].replies.push(reply);
        const replyBox = `comment_${comment_index}`;
        document.getElementById(replyBox).style.display = "none";
        renderComments();
    }

    function openReplyBox(index) {
        const replyBox = `comment_${index}`;
        document.getElementById(replyBox).style.display = "flex";
    }

    function renderComments2(e) {
        const commentsSection = document.getElementById(`comments_${e}`);
        if(!commentsSection) {
            return;
        }
        commentsSection.innerHTML = ``;

        function createCommentElement(comment, commentIndex) {
            var mysqlDateTimeString = comment.date_sent;
            var currentDateTime = new Date();
            var mysqlDateTime = new Date(mysqlDateTimeString);

            // var currentTimestampInHours = Math.floor(((currentDateTime.getTime() / 1000) / 60) / 60);
            // var mysqlTimestampInHours = Math.floor(((mysqlDateTime.getTime() / 1000) / 60) / 60);
            // var duration = currentTimestampInHours - mysqlTimestampInHours;
            // var durationString = duration + "h";
            // if(duration == 0) {
            //     currentTimestampInHours = Math.floor((currentDateTime.getTime() / 1000) / 60);
            //     mysqlTimestampInHours = Math.floor((mysqlDateTime.getTime() / 1000) / 60);
            //     duration = currentTimestampInHours - mysqlTimestampInHours;
            //     durationString = duration + "m";
            // }

            var currentTimestampInHours = Math.floor(((currentDateTime.getTime() / 1000) / 60) / 60);
            var mysqlTimestampInHours = Math.floor(((mysqlDateTime.getTime() / 1000) / 60) / 60);
            var duration = currentTimestampInHours - mysqlTimestampInHours;
            var durationString;

            if (duration === 0) {
                currentTimestampInHours = Math.floor((currentDateTime.getTime() / 1000) / 60);
                mysqlTimestampInHours = Math.floor((mysqlDateTime.getTime() / 1000) / 60);
                duration = currentTimestampInHours - mysqlTimestampInHours;
                durationString = duration + "m";
            } else if (duration >= 24 * 7 * 4 * 12) { // If duration is greater than or equal to a year
                duration = Math.floor(duration / (24 * 7 * 4 * 12));
                durationString = duration + "y";
            } else if (duration >= 24 * 7 * 4) { // If duration is greater than or equal to a month
                duration = Math.floor(duration / (24 * 7 * 4));
                durationString = duration + "m";
            } else if (duration >= 24 * 7) { // If duration is greater than or equal to a week
                duration = Math.floor(duration / (24 * 7));
                durationString = duration + "w";
            } else if (duration >= 24) { // If duration is greater than or equal to a day
                duration = Math.floor(duration / 24);
                durationString = duration + "d";
            } else {
                durationString = duration + "h";
            }

            const commentElement = document.createElement('div');
            commentElement.classList.add('comment-box');
            var optionButton;
            if(comment.userID == sessionID) {
                optionButton = `
                            <div class="dropdown ms-2  mt-auto mb-auto">
                                <div class="btn-link" data-bs-toggle="dropdown">
                                    <svg width="20" height="15" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="delete.comment.php?id=${comment.id}&date">Delete</a>
                                </div>
                            </div>
                `;
            } else {
                optionButton = ``;
            }
            
            commentElement.innerHTML = `
                <div class="comment">
                    <div>
                        <div class="d-flex project-image">
                            <img src="../profile_upload/${comment.pic}" alt="">
                            <div class="row">
                                <div class="col">
                                    <div style="background:#d9d7d7; padding: 5px 10px; border-radius: 13px; max-width: 500px; max-height: 500px; display: flex; flex-direction: column; text-align: left">
                                        <label style="font-weight: 550;">${comment.user}</label>
                                        ${comment.text}
                                    </div>
                                </div>
                            </div>`
                         + optionButton +   
                        `</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label style="border: 0; background:transparent; font-size: 11px; padding-left: 45px; padding-bottom: 5px">${durationString}</label>
                        
                     </div>
                </div>
                <div id="comment_${comment.index}" style="padding-left: 40px; display: none; width: 100%; margin-bottom: 10px">
                    <textarea id="reply_text_${comment.index}" style="max-width: 340px; width: 100%; border-radius: 13px; padding-left: 10px" placeholder="Write your reply..."required></textarea>
                    <button class="btn btn-primary" style="margin-left: 5px; margin: 5px" onclick="addReply(${commentIndex}, ${comment.index})">Send</button>
                </div>
                `

            if (comment.replies.length > 0) {
                const repliesContainer = document.createElement('div');
                repliesContainer.className = 'replies';
                comment.replies.forEach((reply) => {
                    const replyElement = document.createElement('div');
                    replyElement.innerHTML = `
                        <div style="padding-bottom: 7px">
                            <div class="d-flex project-image" style="padding-left:50px">
                                <img src="images/customers/22.jpg" alt="">
                                <div class="row">
                                    <div class="col">
                                        <div style="background:#d9d7d7; padding: 5px 10px; border-radius: 13px; padding-bottom:7px">${reply.text}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label style="border: 0; background:transparent; font-size: 11px; padding-right: 230px; padding-bottom: 5px">${currentTimestampInHours - mysqlTimestampInHours}h</label>
                             </div>
                        </div>
                    `;
                    repliesContainer.appendChild(replyElement);
                });
                commentElement.appendChild(repliesContainer);
            }

            return commentElement;
        }

        commentsData.forEach((comment, index) => {
            if(comment['comments_id'] == e) {
                const commentElement = createCommentElement(comment, index);
                commentsSection.appendChild(commentElement);
            }
        });
    }

    function renderComments() {
        const commentsSection = document.getElementById(`comments_${selectedId}`);
        commentsSection.innerHTML = ``;

        function createCommentElement(comment, commentIndex) {
            var mysqlDateTimeString = comment.date_sent;
            var currentDateTime = new Date();
            var mysqlDateTime = new Date(mysqlDateTimeString);

            var currentTimestampInHours = Math.floor(((currentDateTime.getTime() / 1000) / 60) / 60);
            var mysqlTimestampInHours = Math.floor(((mysqlDateTime.getTime() / 1000) / 60) / 60);
            const commentElement = document.createElement('div');
            commentElement.classList.add('comment-box');
            commentElement.innerHTML = `
                <div class="comment">
                    <div>
                        <div class="d-flex project-image">
                            <img src="images/bsu.png" alt="">
                            <div class="row">
                                <div class="col">
                                    <div style="background:#d9d7d7; padding: 5px 10px; border-radius: 13px;">${comment.text}</div>
                                </div>
                            </div>
                            <div class="dropdown ms-2  mt-auto mb-auto">
                                <div class="btn-link" data-bs-toggle="dropdown">
                                    <svg width="20" height="15" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label style="border: 0; background:transparent; font-size: 11px; padding-left: 45px; padding-bottom: 5px">${currentTimestampInHours - mysqlTimestampInHours}h</label>
                        <button style="border: 0; background:transparent; font-size: 11px; padding-left: 13px; padding-bottom: 5px"onclick="openReplyBox(${comment.index})">Reply</button>
                    </div>
                </div>
                <div id="comment_${comment.index}" style="padding-left: 40px; display: none; width: 100%; margin-bottom: 10px">
                    <textarea id="reply_text_${comment.index}" style="max-width: 340px; width: 100%; border-radius: 13px; padding-left: 10px" placeholder="Write your reply..."required></textarea>
                    <button class="btn btn-primary" style="margin-left: 5px; margin: 5px" onclick="addReply(${commentIndex}, ${comment.index})">Send</button>
                </div>
                `

            if (comment.replies.length > 0) {
                const repliesContainer = document.createElement('div');
                repliesContainer.className = 'replies';
                comment.replies.forEach((reply) => {
                    const replyElement = document.createElement('div');
                    replyElement.innerHTML = `
                        <div style="padding-bottom: 7px">
                            <div class="d-flex project-image" style="padding-left:50px">
                                <img src="images/bsu.png" alt="">
                                <div class="row">
                                    <div class="col">
                                        <div style="background:#d9d7d7; padding: 5px 10px; border-radius: 13px; padding-bottom:7px max-width: 500px; max-height: 500px">${reply.text}</div>
                                    </div>
                                </div>
                                <div class="dropdown ms-2  mt-auto mb-auto">
                                    <div class="btn-link" data-bs-toggle="dropdown">
                                        <svg width="20" height="15" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label style="border: 0; background:transparent; font-size: 11px; padding-right: 230px; padding-bottom: 5px">${currentTimestampInHours - mysqlTimestampInHours}h</label>
                             </div>
                        </div>
                    `;
                    repliesContainer.appendChild(replyElement);
                });
                commentElement.appendChild(repliesContainer);
            }

            return commentElement;
        }

        commentsData.forEach((comment, index) => {
            if(comment['comments_id'] == selectedId) {
                const commentElement = createCommentElement(comment, index);
                commentsSection.appendChild(commentElement);
            }
        });
    }