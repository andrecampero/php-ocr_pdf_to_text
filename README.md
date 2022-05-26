### php-ocr_pdf_to_text

#### Infra
- PHP
- Linux

#### Libs
- Imagemagick https://github.com/ImageMagick/ImageMagick
- Tesseract https://github.com/tesseract-ocr/tesseract

#### Inst / Config
- Imagemagick
`apt-get install -y imagemagick`

- Config Imagemagick to read PDF (insert read|write in pattern PDF)
`nano /<imagemagick_folder>/policy.xml` 
 
- Tesseract
`apt install -y tesseract-ocr`
`apt install libtesseract-dev`

- Util:
`apt install -y poppler-utils`

- Test Imagemagick and Tesseract
`convert -version` and `tesseract --version`

- God bless you!
