function addUser()
{
    $username = document.getElementById("user-name").value;
    $password = document.getElementById("password").value;
    $confirmPassword = document.getElementById("confirm-password").value;

    if(usernameControl($username)) {
        if ($password.length > 6 && $username.length > 2) {
            if ($password == $confirmPassword) {
                console.log($password);
                console.log($username);
                $.ajax({
                    type: "POST",
                    url: "../Models/add_new_user.php",
                    data: {
                        username: $username,
                        password: $password
                    }
                })
                    .done((data) => {
                        if (data == 0) {
                            alert('Meno už existuje');
                        } else {
                            alert('Účet bol vytvorený');
                        }

                    })

                    .fail(function () {
                        console.log("nic sa nestalo :'(");
                    });
            } else {
                alert("Heslá sa nezhodujú");
            }
        } else {
            alert('Heslo musí mať aspoň 7 znakov a meno viac ako 2!');
        }
    } else {
        alert('Meno musí obsahovať len písmená a čísla');
    }

};

function loginUser()
{
    $loginUsername = document.getElementById("login-name").value;
    $loginPassword = document.getElementById("login-password").value;
    if ($loginPassword.length > 1 && $loginUsername.length > 1 && usernameControl($loginUsername))  {
    console.log($loginUsername);
    console.log($loginPassword);
    $.ajax({
        type: "POST",
        url: "../Models/log_user.php",
        data: {
            username: $loginUsername,
            password: $loginPassword
        }
    })
        .done((data) => {
            if (data == 0) {
                alert('Meno alebo heslo nieje správne!');
            } else {
                alert('Prihlásený');
                console.log (data);
            }

            console.log(data);
        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        });
    } else {
        alert('Neplatny vstup');
    }

};


function addPost()
{
    $postName = document.getElementById("post-name").value;
    $postText = document.getElementById("post-text").value;
    if ($postName.length > 1 && $postText.length > 1 && textControl($postName) && textControl($postText)) {
        $.ajax({
            type: "POST",
            url: "../Models/add_new_post.php",
            data: {
                postName: $postName,
                postText: $postText
            }
        })
            .done((data) => {
                if (data == 1) {
                    alert('uspech');
                    document.getElementById("post-name").value = "";
                    document.getElementById("post-text").value = "";
                } else {
                    console.log(data);
                }
            })

            .fail(function () {
                console.log("nic sa nestalo :'(");
            });
    } else {
        alert('Názov príspevku ani obsah nemôžu byť prázdne!');
    }
};


function delUser(idUser)
{
    $.ajax({
        type: "POST",
        url: "../Models/user_action.php",
        data: {
            Action: "del_user",
            idUser: idUser
        }
    })
        .done((data) => {
            if (data == 1) {
                alert('vymazane');
            }
            else {
                console.log(data);
            }

        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        });

};

function isAdmin(idUser)
{
    $isAlredyAdmin = '0';
    $checkbox = document.getElementById(idUser);
    if ($checkbox.checked == true) {
        $isAlredyAdmin = '1';
    } else {
        $isAlredyAdmin = '0';
    }
    console.log($isAlredyAdmin);
    $.ajax({
        type: "POST",
        url: "../Models/user_action.php",
        data: {
            Action: "add_user_admin",
            idUser: idUser,
            isAlredyAdmin: $isAlredyAdmin
        }
    })
        .done((data) => {
            if ((data == 1) && ($isAlredyAdmin == 1)) {
                alert('Používateľ zmenený na admina');
            }
            if ((data == 1) && ($isAlredyAdmin == 0)) {
                alert('Používateľovi boli odobraté adminské práva');
            }

        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        })
};

function userLogout()
{
    $.ajax({
        type: "POST",
        url: "../Models/session_manager.php",
        data: {

        }
    })
        .done((data) => {
            if (data == 1) {
                alert('odhlaseny');
                location.reload();
            }
            else {
                alert('Nieco sa nepodarilo');
            }

        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        });
};

function openForum(clickedId)
{
    document.getElementById('hidden-theme-id').value = clickedId;
    $.ajax({
        type: "POST",
        url: "../Models/post_actions.php",
        data: {
            Action: "show_details",
            id: clickedId
        }
    })
        .done((data) => {
            document.getElementById('forum-group').innerHTML = data;
        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        });
};

function addNewComment()
{
    $themeId = document.getElementById('hidden-theme-id').value;
    $comment = document.getElementById('new-post-comment').value;

    if ($comment.length > 1 && textControl($comment) ) {
        $.ajax({
            type: "POST",
            url: "../Models/post_actions.php",
            data: {
                Action: "add_comment",
                themeId: $themeId,
                comment: $comment
            }
        })
            .done((data) => {
                if (data == 1) {
                    alert('komentar vytvoreny');
                    location.reload();
                } else {
                    alert('chyba');
                }
            })

            .fail(function () {
                console.log("nic sa nestalo :'(");
            });
    } else {
    alert('Komentár je moc krátky!');
}
};

function delComment(idComment)
{
    $.ajax({
        type: "POST",
        url: "../Models/post_actions.php",
        data: {
            Action: "dell_comment",
            commentId: idComment
        }
    })
        .done((data) => {
            if (data == 1) {
                alert('komentar bol vymazaný');
                location.reload();
            } else {
                alert('chyba');
            }
        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        });
};

function saveEditComment(idComment)
{
    $editedText = document.getElementById(idComment).value;
    if ($editedText.length > 1 && textControl($editedText) ) {
        $.ajax({
            type: "POST",
            url: "../Models/post_actions.php",
            data: {
                Action: "edit_comment",
                commentId: idComment,
                editedText: $editedText
            }
        })
            .done((data) => {
                console.log(data);
                if (data == 1) {
                    alert('komentar bol upravený');
                    location.reload();
                } else {
                    alert('chyba');
                }
            })

            .fail(function () {
                console.log("nic sa nestalo :'(");
            });
    }
}

function delTheme(idTheme)
{
    $.ajax({
        type: "POST",
        url: "../Models/theme_actions.php",
        data: {
            Action: "dell_theme",
            themeId: idTheme
        }
    })
        .done((data) => {
            if (data == 1) {
                alert('diskusia bola vymazaná');
                location.reload();
            } else {
                alert('chyba');
            }
        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        });
};

function saveEditTheme(idTheme)
{
    $editedText = document.getElementById(idTheme).value;
    if ($editedText.length > 1 && textControl($editedText)) {
        $.ajax({
            type: "POST",
            url: "../Models/theme_actions.php",
            data: {
                Action: "edit_theme",
                themeId: idTheme,
                editedText: $editedText
            }
        })
            .done((data) => {
                if (data == 1) {
                    alert('Diskusia bola upravená');
                    location.reload();
                } else {
                    console.log(data);
                    alert('chyba');
                }
            })

            .fail(function () {
                console.log("nic sa nestalo :'(");
            });
    } else {
        alert('Komentár je moc krátky, ak si želáte komentár odstrániť použite tlačidlo vymazať!');
    }
}

function addNews()
{
    $newsName = document.getElementById("news-name").value;
    $newsSummary = document.getElementById("news-summary").value;
    $newsText = document.getElementById("news-text").value;

    if ($newsName.length > 1 && $newsSummary.length > 1 && $newsText.length > 1 && textControl($newsName)) {
        $.ajax({
            type: "POST",
            url: "../Models/news.php",
            data: {
                Action: "add_news",
                newsName: $newsName,
                newsSummary: $newsSummary,
                newsText: $newsText
            }
        })
            .done((data) => {
                if (data == 1) {
                    alert('uspech');
                    location.reload();
                } else {
                    console.log(data);
                }
            })

            .fail(function () {
                console.log("nic sa nestalo :'(");
            });
    } else {
    alert('Neplatny vstup');
}
}

function delNews(idNews)
{
    $.ajax({
        type: "POST",
        url: "../Models/news.php",
        data: {
            Action: "dell_news",
            idNews: idNews
        }
    })
        .done((data) => {
            if (data == 1) {
                alert('Článok bol vymazaný');
                location.reload();
            } else {
                alert('chyba');
            }
        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        });
}

function saveEditSummaryNews(idNews)
{
    $idNews = idNews;
    $newsEditedText = document.getElementById($idNews).value;
    if ($newsEditedText.length > 1 && textControl($newsEditedText)) {
        $.ajax({
            type: "POST",
            url: "../Models/news.php",
            data: {
                Action: "edit_news",
                idNews: $idNews,
                editedSummaryText: $newsEditedText
            }
        })
            .done((data) => {
                if (data == 1) {
                    alert('Diskusia bola upravená');
                    location.reload();
                } else {
                    alert('chyba');
                }
            })

            .fail(function () {
                console.log("nic sa nestalo :'(");
            });
    } else {
        alert('Správa je príliš krátka');
    }
}

function saveEditModalNews()
{
    $idNews = document.getElementById('hidden-news-id').value;
    $text = document.getElementById('textareaNewText').value;

    if ($text.length > 1 && textControl($text)) {
        $.ajax({
            type: "POST",
            url: "../Models/news.php",
            data: {
                Action: "edit_news_modal",
                idNews: $idNews,
                editedText: $text
            }
        })
            .done((data) => {
                if (data == 1) {
                    alert('Diskusia bola upravená');
                    location.reload();
                } else {
                    alert('chyba');
                }
            })

            .fail(function () {
                console.log("nic sa nestalo :'(");
            });
    }
}

function openNews(clickedId)
{
    document.getElementById('hidden-news-id').value = clickedId;
    $.ajax({
        type: "POST",
        url: "../Models/news.php",
        data: {
            Action: "show_details",
            id: clickedId
        }
    })
        .done((data) => {
            document.getElementById('form-news').innerHTML = data;
        })

        .fail(function () {
            console.log("nic sa nestalo :'(");
        });

}


//upravena funkcia z internetu (w3schools)

function usernameControl(inputtxt)
{
    var letters = /^[0-9A-Za-zá-žÁ-Ž]+$/;
    if(inputtxt.match(letters))
    {
        return true;
    }
    else
    {
        return false;
    }
}


function textControl(inputtxt)
{
    var letters = /^[0-9A-Za-zá-ž ?.Á-Ž]+$/;
    if(inputtxt.match(letters))
    {
        return true;
    }
    else
    {
        return false;
    }
}