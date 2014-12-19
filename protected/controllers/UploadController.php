<?php
class UploadController extends Controller
{
        public function actionIndex()
        {
                $this->render('index');
        }

    public function actionViewPdf()
    {
        $filename = $_GET['filename'] . '.pdf';
        $filepath = YiiBase::getPathOfAlias('webroot').'/upload/' . $filename;

        if(file_exists($filepath))
        {
            //echo 'si existe';
            // Set up PDF headers
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($filepath));
            header('Accept-Ranges: bytes');

            // Render the file
            readfile($filepath);
        }
        else
        {
            //PDF doesn't exist so throw an error or something
            echo $filepath;
        }
    }
}