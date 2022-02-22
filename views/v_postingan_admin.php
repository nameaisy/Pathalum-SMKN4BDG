<!-- 
LIST TO DO ON HERE :
- This file to create the fixed button and form
- Getting data from form using the post method
- Admin can post the title, context and media (photo or video) on form
-->                          
                                <!-- READ THIS BEFORE RUN
Make sure you have configure "php.ini" file on your xampp folder, search for 'file_uploads' and set it to 
'On' like this 'file_uploads = On' -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/popup.css">
    <title>Pathalum</title>
</head>





<body>   

<!--BOOTSTRAPS FOR FORM POSTINGAN-->
            <script
            href="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>




<!-- ADMIN WILL SEE THE POSTS ON HERE -->


<script type="text/javascript" src="file.js"></script>

<div class="main-container">

      <div class="second-container">
          <h2>POSTINGAN</h2>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminaddpost">
          <img src="https://img.icons8.com/windows/32/000000/plus-math.png"/>
          </button>
          
            <div class="boxes">
                <div class="box">
                    <div class="photo"></div>
                    <div class="text">

                    </div>   
                </div>
            </div>
      </div>
</div>





<!-- ADMIN WILL PUT THE DATA ON HERE (FORM POSTINGAN)-->

          
    <div class="modal fade" id="adminaddpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Postingan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <label for="cars">Kategori</label>
                        <select name="category" id="category">
                        <option value="beasiswa">Beasiswa</option>
                        <option value="loker">Lowongan Pekerjaan</option>
                        </select>
                    <textarea name="post-title" id="" cols="30" rows="1" placeholder="Judul Postingan"></textarea>
                    <textarea name="post" id="" cols="30" rows="5" placeholder="Deskripsi Postingan"></textarea>
                    <div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" method="post" action="" data-bs-dismiss="modal">Buat</button>
                    <button type="button" class="text"><img src="https://img.icons8.com/ios-filled/26/000000/a.png"/></button>
                    <button type="button" class="link"><img src="https://img.icons8.com/material-outlined/24/000000/link--v1.png"/></button>
                    <button type="button" class="drive"><img src="https://img.icons8.com/windows/32/000000/google-drive.png"/></button>
                    <button type="button" class="image"><img src="https://img.icons8.com/material-outlined/24/000000/image.png"/></button>
                    <input type="file" id="file" name="attach"><img src="https://img.icons8.com/material-outlined/24/000000/attach.png"/></input>
                    <button type="button" class="clear"><img src="https://img.icons8.com/windows/24/000000/trash.png"/></button>
                </div>
            </div>
        </div>
    </div>
</body>



