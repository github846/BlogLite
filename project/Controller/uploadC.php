<?php

class UploadC
{

    public $folder = "Upload/"; // uploaded file directory

    /** getter 1: URL */
    public function getFileURL()
    {
        return $this->folder . basename($_FILES["file"]["name"]);
    }

    /** getter 2: name */
    public function getFileName()
    {
        return $_FILES["file"]["name"];
    }

    /**  getter 3: extension.  */
    /*public function getFileExtension()
    {
        return strtolower(pathinfo($this->getFileURL(), PATHINFO_EXTENSION));
    }*/

    /**  would you let users upload 14 GB files? */
    public function checkFileSize($fileSize)
    {
        if ($_FILES["file"]["size"] > $fileSize)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /** using name getter method to check for duplicates */
    public function checkFileDuplicate()
    {
        return file_exists($this->getFileName());
    }

    /** checking the extension among those accepted
     * uses extension getter
     */
    /*public function checkFileExtension($ExtensionList)
    {
        
        if (in_array($this->getFileExtension(), $ExtensionList))
        {
            return false;
        }
        else
        {
            return true;
        }
    }*/

    /** mime type verifies file content
     *  hold on, if the mime type is correct, why check for the extension?
     *  
     */
    public function checkMIME($MIMEList)
    {
        $MIMEType = mime_content_type($_FILES["file"]["tmp_name"]);
        /** teste si le type mine du fichier mime_content_type() se trouve dans le tableau $arr */

        if (in_array($MIMEType, $MIMEList))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    /* what's happening here? */
    public function uploadChecks()
    {
        if (isset($_FILES['file']))
        {
            /*$indexP = $_SESSION['indexP'];*/ 
            $uploadedFile = $_FILES['file']['name'];

            if (isset($_FILES['file']['tmp_name']))
            {
                $tmpFile = $_FILES['file']['tmp_name'];

                if (move_uploaded_file($tmpFile, $this->folder . $uploadedFile))
                {
                    echo 'File uploaded';
                }
                else
                {
                echo 'Failed upload';
                }
            }
        }
        else
        {
            echo 'Nothing here';
        }
    }


}


    