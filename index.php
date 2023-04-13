<?php 
include './components/header.php';
$app = '<script src="../assets/js/app.signin.js"></script>';
?>


<div id="guestbook" class="guestbook">
    <form @submit="funcSaveGuest($event)">
        <h5>Sign Our Guestbook</h5>
        <div class="fullname">
            <label for="fullname">Fullname</label>
            <input type="text" id="fullname" name="fullname" placeholder="Fullname">
        </div>
        <div class="emailadd">
            <label for="emailadd">Email Address</label>
            <input type="email" id="emailadd" name="emailadd" placeholder="Email Address">
        </div>
        <div class="website">
            <label for="website">Website URL</label>
            <input type="text" id="website" name="website" placeholder="Website URL">
        </div>
        <div class="comment">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Comments"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
    <div class="latest">
        <div id="latestguest">
            <h5>Latest Guestbook</h5>
        </div>
        <div class="card" v-for="guest in guests">
            <span>Name              :       {{guest.fullname}}</span>
            <span>Email             :       {{guest.emailadd}}</span>
            <span>Website URL       :       {{guest.website}}</span>
            <span>Comment           :       {{guest.comment}}</span>
            <span>Date and Time     :       {{guest.date_inserted}}</span>
        </div>
    </div>
</div>


<?php include './components/footer.php'?>

