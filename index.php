<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <button id="btnBack"> back </button>
    <div id="main">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody id="tblPosts">
            </tbody>
        </table>
    </div>
    <div id="detail">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody id="tbrPosts">
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody id="tbmPosts">
            </tbody>
        </table>
    </div>
</body>
<script>
    function showDetails(id) {
        $("#main").hide();
        $("#detail").show();
        $("#btnBack").show();
        var url = "https://jsonplaceholder.typicode.com/posts/" + id;
        var comments_url = "https://jsonplaceholder.typicode.com/posts/" + id + "/comments";
        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr>";
                line += "<td>" + data.id + "</td>";
                line += "<td><b>" + data.title + "</b></td>";
                line += "<td>" + data.body + "</td>";
                line += "</tr>";
                $("#tbrPosts").append(line);
            })
            .fail((xhr, status, error) => {
            })
        $.getJSON(comments_url)
            .done((data) => {
                $.each(data, (k, item) => {
                    console.log(data);
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>";
                    line += "<td>" + item.name + "</td>";
                    line += "<td><b>" + item.email + "</b></td>";
                    line += "<td>" + item.body + "</td>";
                    line += "</tr>";
                    $("#tbmPosts").append(line);
                });
            })
            .fail((xhr, status, error) => {
            })
    }
    function loadPosts() {
        $("#main").show();
        $("#details").hide();
        $("#btnBack").hide();
        var url = "https://jsonplaceholder.typicode.com/posts";
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    console.log(item);
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>";
                    line += "<td><b>" + item.title + "</b><br/>";
                    line += item.body + "</td>";
                    line += "<td> <button onClick='showDetails(" + item.id + ");' > link </button> </td>";
                    line += "</tr>";
                    $("#tblPosts").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, status, error) => {
            })
    }
    $(() => {
        loadPosts();
        $("#btnBack").click(() => {
            location.reload();
            $("#btnBack").hide();
        });
    });
</script>

</html>
