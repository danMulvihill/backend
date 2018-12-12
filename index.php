<?php
// functions
function makeReturn(){
    echo "<br /><button onClick='window.history.back();'>Go Back</button>";
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments form</title>
</head>
<body>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validation
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $name = NULL;
        echo "<p>You must enter a name</p>";
        makeReturn(); return;
    }

    
    $mail = $_POST['mail'];
    $comment = $_POST['comment'];

    if(isset($_POST['ans'])){
        $ans = $_POST['ans'];
    }else{
        $ans = NULL;
    }

    if ($ans != NULL){
        switch ($ans){
            case "hard":
                echo "<p>Wrong answer to question. You can't throw a window</p>";
                break;
            case "soft" || "class":
                echo "<p>Your answer is half correct. I'll let you comment.</p>";
                break;
            case "x":
                echo "<p>Correct answer</p>";
        }
    }else{
        echo "You must select one answer"; 
        makeReturn(); return;
    }

    echo "<p>$name said:</p>";
    echo "<blockquote>$comment</blockquote>";

    echo "<p>If you are unhappy with what $name said, 
    he can be contacted at $mail</p>";

    if ($ans != "x"){
        echo "<p>$name doesn't know what and object is. How embarrassing!</p>";
    }
    

}else{ ?>
    <h2>Generic Comment Form</h2> <p>This will evently store data in a database.
    Right now, it just responds to you upon submission. Try it!</p>

    <form action="" method="POST">
    <fieldset>
        <legend>Tell us what you think?</legend>
        <dl>
            <dt>Name:</dt>
            <dd><input type="text" name="name" /></dd>
            <dt>Email:</dt>
            <dd><input type="email" name="mail" /></dd>
            <dt>You must answer this question to comment: What is an Object? </dt>
            <dd>
                <input type="radio" name="ans" value="hard" />
                Anything you can throw <br />
                <input type="radio" name="ans" value="soft" />
                A collection of properties <br />
                <input type="radio" name="ans" value="class" />
                An instance of a class <br />
                <input type="radio" name="ans" value="x" />
                Both B and C </ br>
            </dd>
            <dt>Comments:</dt>
            <dd>
                <textarea row="15" cols="50" name="comment">
                </textarea>
            </dd>
        </dl>
        <p><input type="submit" /></p>
    </fieldset>
    </form>
</body>
</html>

<?php } ?>