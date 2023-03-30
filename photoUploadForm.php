<!-- Using Array -->
if (isset($_POST['submit_3'])) {
                            $members = array(
                                array('id' => 1, 'name' => $_POST['p1_name'], 'designation' => $_POST['p1_designation'], 'content' => $_POST['p1_content'], 'img' => $_FILES['p1_image']),
                                array('id' => 2, 'name' => $_POST['p2_name'], 'designation' => $_POST['p2_designation'], 'content' => $_POST['p2_content'], 'img' => $_FILES['p2_image']),
                                array('id' => 3, 'name' => $_POST['p3_name'], 'designation' => $_POST['p3_designation'], 'content' => $_POST['p3_content'], 'img' => $_FILES['p3_image'])
                            );

                            foreach ($members as $member) {
                                $img_name = $member['img']['name'];
                                $temp_name = $member['img']['tmp_name'];
                                $img_location = '../ami/images/member_img/' . basename($img_name);

                                if (isset($img_name) and !empty($img_name)) {
                                    if (!file_exists($img_location)) {
                                        if (move_uploaded_file($temp_name, $img_location)) {
                                            $displayquery = "SELECT * FROM member_info WHERE id=" . $member['id'];
                                            $query = mysqli_query($connection, $displayquery);

                                            foreach ($query as $row) {
                                                if (file_exists($row['image_location'])) {
                                                    unlink($row['image_location']);
                                                }
                                            }

                                            $sql_update = "UPDATE member_info SET member_name='" . $member['name'] . "', image_location='" . $img_location . "', image_name='" . $img_name . "', designation='" . $member['designation'] . "', content='" . $member['content'] . "' WHERE id=" . $member['id'];

                                            if (mysqli_query($connection, $sql_update)) {
                                                echo 'Updated successfully in database<br />';
                                            } else {
                                                echo 'Not inserted in database<br />';
                                            }
                                        }
                                    }
                                } else {
                                    $sql_update = "UPDATE member_info SET member_name='" . $member['name'] . "', designation='" . $member['designation'] . "', content='" . $member['content'] . "' WHERE id=" . $member['id'];

                                    if (mysqli_query($connection, $sql_update)) {
                                        echo 'Updated successfully in database<br />';
                                    } else {
                                        echo 'Not inserted in database<br />';
                                    }
                                }
                            }
                        }
