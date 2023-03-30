<form method="post">
          <input class="srt-box" type="text" name="name" id="" placeholder="Name *" />
          <input class="srt-box" type="email" name="email" id="" placeholder="E-mail *" />
          <input class="lrg-box" type="text" name="subject" placeholder="Subject" />
          <textarea class="txt-area" name="message" id="" placeholder="Message *"></textarea>
          <!-- <div class="agree-box">
            <input type="checkbox" name="" id="" />
            <p>I agree that my submitted data is being collected and stored.</p>
          </div> -->
          <div class="sbt">
            <input type="submit" name="submit" value="Send Message" class="btn btn-primary sbt-btn">
            </input>
          </div>
          <?php
          if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $sql = "INSERT INTO inquiry (name,email,subject,message) VALUES ('$name','$email','$subject','$message') ";

            if (!mysqli_query($connection, $sql)) {
              echo 'error:' . mysqli_error($connection);
            }
          }
          ?>
        </form>
