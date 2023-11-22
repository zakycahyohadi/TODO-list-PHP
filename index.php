
<?php 
include "config.php";

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM tb_note WHERE title_note LIKE '%$searchTerm%' OR note_note LIKE '%$searchTerm%'";
$sql = mysqli_query($conn, $query);


$no=0;

$tanggal_waktu = date('d-m-Y');


//var_dump($result);
//die();


?>

<!DOCTYPE html>
<html lang="en">

<head>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("note-search").addEventListener("input", function () {
            var searchTerm = this.value.toLowerCase();
            var notes = document.querySelectorAll(".card");

            notes.forEach(function (note) {
                var title = note.querySelector(".card-title").innerText.toLowerCase();
                var content = note.querySelector(".card-text").innerText.toLowerCase();

                if (title.includes(searchTerm) || content.includes(searchTerm)) {
                    note.style.display = "block";
                } else {
                    note.style.display = "none";
                }
            });
        });
    });
</script>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<button type="button" class="btn btn-light"></button>

<body>
    <div class="container text-danger">
        <nav class="navbar bg-body-tertiary" >
            <div class="container-fluid rounded" style="background-color: black;">
                <a class="mb-4 navbar-brand" >
                    <h1 class="text-danger mt-4 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                            class="mb-1 bi bi-journal-bookmark" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z" />
                            <path
                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path
                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg> NOTE
                    </h1>
                </a>
                <form class="d-flex" role="search" method="GET" action="">
                    <input class="form-control me-2" type="text" id="note-search" name="search" placeholder="SEARCH YOUR NOTE" aria-label="Search"
                        name="keyword">
                    <button class="btn btn-outline-danger" type="submit">SEARCH</button>
                </form>
            </div>
        </nav>
        <!-- navbar end -->
        <div class="card shadow bg-body-tertiary rounded mb-4 mt-2" >
            <div class="card-body" style="background-color:black;">
                <form class="d-flex" action="insert.php" method="post">
                    <input class="form-control me-2" name="title_note" placeholder="WRITE YOUR TITLE ........">
                    <input class="form-control me-2" name="note_note" placeholder="WRITE YOUR NOTE ........">
                    <button class="btn btn-primary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                            class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path
                                d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z" />
                            <path
                                d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                        </svg>ADD
                    </button>
                </form>
            </div>
        </div>
        <div class="card">
            <?php 
              while  ($result=mysqli_fetch_assoc($sql)){
               
              ?>

            <div class="card-header mt-2" >
                <h2>

                    <button type="button" class="btn btn-danger mb-2"><?php echo ++$no ?></button>
                </h2>
                <h3 class="d-flex justify-content-center">
                    <?php 
                    echo $tanggal_waktu
                    ?>
                </h3>

            </div>

            <div class="card-body">
                <h5 class="card-title"><?php echo $result['title_note'];?></h5>
                <p class="card-text"><?php echo $result['note_note'];?></p>
                <div class="d-flex justify-content-between">
                    <a href="update.php?edit=<?php echo $result['id_note'];?>" class="btn btn-success"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="mb-1 bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>EDIT</a>

                    <a href="delete.php?delete=<?php echo $result['id_note'];?>" class="btn btn-danger "><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16 " fill="currentColor"
                            class="mb-1 bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>DELETE</a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>






    <!-- JS BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>