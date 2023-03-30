<form action="" method="post" enctype="multipart/form-data" class="add-category__form">
                        <div class="form__section">
                            <label for="" class="form__label">
                                <div>New Category Name</div>
                                :
                            </label>
                            <div class="form__input-div">
                                <input type="text" name="cate_name" id="" class="form__text-input" />
                            </div>
                        </div>
                        <div class="form__section">
                            <label for="" class="form__label">
                                <div>New Category Image</div>
                                :
                            </label>
                            <div class="form__input-wrap">
                                <div class="form__input-div">
                                    <input type="file" name="upload" accept=".png, .jpg, .jpeg" id=""
                                        class="form__file-input" />
                                </div>
                                <div class="form__input-note">
                                    <span>*image size 12px x 12px is acceptable</span>
                                </div>
                            </div>
                        </div>
                        <div class="form__section">
                            <input type="submit" name="submit" value="Add Category"
                                class="btn btn-primary form__now--btn">
                            </input>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $cate_name = $_POST['cate_name'];
                            $img_name  = $_FILES['upload']['name'];
                            $temp_name  = $_FILES['upload']['tmp_name'];
                            if (isset($img_name) and !empty($img_name)) {
                                $location = '../ami/images/glry-imgs/main_gallery_imgs/' . basename($img_name);
                                if (!file_exists($location)) {
                                    if (move_uploaded_file($temp_name, $location)) {
                                        $uploadquery = "INSERT into all_category(cate_name, img_name, image) VALUES('$cate_name','$img_name', '$location')";
                                        if (mysqli_query($connection, $uploadquery)) {
                                            echo 'Inserted in database<br />';
                                        } else {
                                            echo 'Not inserted in database<br />';
                                        }
                                    }
                                } else {
                                    echo 'File already exists in Database';
                                }
                            } else {
                                echo 'You should select a file to upload !!';
                            }
                        }
                        ?>
                    </form>
