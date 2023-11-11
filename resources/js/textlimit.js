const limit = document.querySelector(".txt-limit");
const str = limit.textContent;
const len = 50; // 半角50字（全角約25字）
if (str.length > len) {
  limit.textContent = str.substring(0, len) + "…";
}
