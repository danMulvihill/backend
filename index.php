<?php
// functions
function makeReturn($res){
    //print_r($res);
    foreach($res as $response){
        echo "<p>$response</p><button onClick='window.history.back();'>Go Back</button>";
    }    
}
?>

<?php include("header.php") ?>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validation
    $time = (!isset($_POST['time']))? NULL : $_POST['time'];

    if(!empty(trim($_POST['name']))){
        $name = $_POST['name'];
    }else{
        $name = NULL;
        $responses[] = "<p>You must enter a name</p>";
        makeReturn($responses); return;
    }

    if(!empty(trim($_POST['mail']))){
        $mail = $_POST['mail'];
        //format validation:
    }else{
        $mail = NULL;
        $responses[] = "You must enter an email address";
        makeReturn($responses); return;
    }
    if(!empty(trim($_POST['comment']))){
        $comment = trim($_POST['comment']);

    }else{
        $comment = NULL;
        $responses[] = "You didn't comment! What do you have to say?";
        makeReturn($responses); return;
    }
    

    if(isset($_POST['ans'])){
        $ans = $_POST['ans'];
    }else{
        $ans = NULL;
    }

    if ($ans != NULL){
        echo "$name's answer: ".$ans;
        switch ($ans){
            case "A":
                echo "<p>Wrong answer to question. You can't throw a window</p>";
                break;
            case "D":
                echo "<p>That is correct!</p>"; 
                break;
            default:
                echo "<p>Your answer is half correct. I'll let you comment.</p>";
        }
    }else{
        $responses[] =  "You must select one answer"; 
        makeReturn($responses); return;
    }

    echo "<p>At ".$_POST['time'].", $name said:</p>";
    echo "<blockquote>$comment</blockquote>";

    echo "<p>If anyone else is unhappy with what $name said, 
    he can be contacted at $mail</p>";

    if ($ans != "D"){
        echo "<p>$name doesn't know what and object is. How embarrassing!</p>";
    }
    

}else{ 
    
    $time =  date('H:i, F j');
    

    
    ?>
    <h2>Generic Comment Form</h2> <p>This will eventually store data in a database.
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
                <input type="radio" name="ans" value="A" />
                A. Anything you can throw <br />
                <input type="radio" name="ans" value="B" />
                B. A collection of properties <br />
                <input type="radio" name="ans" value="C" />
                C. An instance of a class <br />
                <input type="radio" name="ans" value="D" />
                D. Both B and C </ br>
            </dd>
            <dt>Comments:</dt>
            <dd>
                <textarea row="15" cols="50" name="comment">
                </textarea>
            </dd>
        </dl>
        <input type="hidden" name="time" value= "<?php echo $time ?>" />
        <p><input type="submit" /></p>
    </fieldset>
    </form>
</body>
</html>

<?php } ?>