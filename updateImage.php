if (isset($_POST['submit_1'])) {

                            $update_id = 0;

                            $u_title = $_POST['about_us_title'];
                            $u_sub_title = $_POST['about_us_sub-title'];
                            $u_abt_content = $_POST['about_us_content'];

                            $img_name  = $_FILES['upload_1']['name'];
                            $temp_name  = $_FILES['upload_1']['tmp_name'];
                            if (isset($img_name) and !empty($img_name)) {
                                $location = '../ami/images/about-us/' . basename($img_name);
                                if (!file_exists($location)) {
                                    if (move_uploaded_file($temp_name, $location)) {

                                        $displayquery = "SELECT * FROM about_us WHERE id=$update_id";
                                        $query = mysqli_query($connection, $displayquery);
                                        foreach ($query as $row) {
                                            if (file_exists($row['image_location'])) {
                                                unlink($row['image_location']);
                                            }
                                        }

                                        $sql_update = "UPDATE about_us SET image_name='$img_name', image_location='$location', title='$u_title', sub_title='$u_sub_title', abt_content='$u_abt_content'  WHERE id=$update_id";
                                        if (mysqli_query($connection, $sql_update)) {
                                            echo 'Updated successfully in database<br />';
                                        } else {
                                            echo 'Not inserted in database<br />';
                                        }
                                    }
                                }
                            } else {
                                $sql_update = "UPDATE about_us SET title='$u_title', sub_title='$u_sub_title', abt_content='$u_abt_content'  WHERE id=$update_id";
                                if (mysqli_query($connection, $sql_update)) {
                                    echo 'Updated successfully in database<br />';
                                } else {
                                    echo 'Not inserted in database<br />';
                                }
                            }
                        }
