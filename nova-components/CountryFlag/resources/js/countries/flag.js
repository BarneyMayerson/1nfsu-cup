export function flagSrc(
  code,
  imagesPath = "/storage/static/flags/",
  ext = ".svg"
) {
  return imagesPath + code.toLowerCase() + ext;
}
