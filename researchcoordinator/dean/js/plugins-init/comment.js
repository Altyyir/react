let commentsData = [];
let comment_index = 0;
var selectedId;
    
    function setId(value) {
        selectedId = value;
    }

    function addComment() {
    const commentText = document.getElementById(`commentText_${selectedId}`).value;
    if (commentText) {
        const comment = { 
            comments_id: selectedId,
            text: commentText, 
            replies: [], 
            index: comment_index
        };
        commentsData.unshift(comment); // Add the new comment at the beginning of the array
        renderComments();
        document.getElementById(`commentText_${selectedId}`).value = '';
        comment_index++;
    }
}


    function addReply(commentIndex, comment_index) {
        const reply_text = document.getElementById(`reply_text_${comment_index}`).value;
        console.log(reply_text);
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

    function renderComments() {
        const commentsSection = document.getElementById(`comments_${selectedId}`);
        commentsSection.innerHTML = ``;

        function createCommentElement(comment, commentIndex) {
            const commentElement = document.createElement('div');
            commentElement.classList.add('comment-box');
            commentElement.innerHTML = `
                <div class="comment">
                    <div>
                        <div class="d-flex project-image">
                            <img src="images/customers/22.jpg" alt="">
                            <div style="background:#a19c9c; padding: 5px 10px; border-radius: 13px;">${comment.text}

                            </div>
                        </div>
                    </div>
                </div>
                <button style="border: 0; background:transparent; font-size: 11px; padding-left: 49px; padding-bottom: 5px"onclick="openReplyBox(${comment.index})">Reply</button>
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
                                <div style="background:#a19c9c; padding: 5px 10px; border-radius: 13px; padding-bottom:7px">${reply.text}</div>
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

    // Initial render
    renderComments();