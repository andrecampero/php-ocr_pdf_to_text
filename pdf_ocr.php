<?php
/* 
Dev.: Andre Campero Silva Gaya
26/05/2022

Libs:
ImageMagick
tesseract OCR
*/

// Paths
$path = "pdf_exemplo";
$pdf_file_path = $path.'/pdf_exemplo.pdf';
$save_img_to = $path.'/pdf-img.png';

// Number pages
exec("pdfinfo $pdf_file_path | grep Pages | awk '{print $2}'", $msg);
$n_pages = $msg[0];
echo "Nº Pgs.: $n_pages";
echo " \r\n ----- \r\n ";

$array_ocr = array();
for($i = 0; $i < $n_pages; $i++)
{
	try {
	
		// ImageMagick - PDF > PNG
		exec('convert -verbose -density 230 -trim "'.$pdf_file_path.'"['.$i.'] -quality 100 -flatten -sharpen 0x1.0 "'.$save_img_to.'"', $output, $return_var_img);
		echo " \r\n ----- \r\n ";
	
		// OCR - Img > String
		exec("tesseract $save_img_to stdout --dpi 150", $msg); // ret array
		array_push($array_ocr, $msg);
		
	} catch (Exception $e) {
		echo $e;
	}

}

print_r($array_ocr);
echo " \r\n ----- \r\n ";

// Get Data
$last_key = $n_pages - 1;
for($i = 0; $i < count($array_ocr[$last_key]); $i++)
{	
	echo $array_ocr[$last_key][$i];
	echo " \r\n ----- \r\n ";
}
?>