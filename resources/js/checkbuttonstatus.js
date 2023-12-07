/**If user dont check the check-box blow "Message from Venue", cant hit a submit button */

    //#with-consent"というIDを持つ要素をドキュメントから取得し、consentという定数に保存します */ 
    const consent = document.querySelector("#with-consent");

    // "#submit"というIDを持つ要素をドキュメントから取得し、buttonという定数に保存します
    const button = document.querySelector("#submit");

    // consent要素の状態が変化したときに実行されるイベントリスナーを追加します
    consent.addEventListener('change', () => {

        // consent要素がチェックされているかどうかを確認します
        if (consent.checked === true) {
            // チェックが入っていれば、submitボタンを有効化します
            button.disabled = false;
        } else {
            // チェックが入っていなければ、submitボタンを無効化します
            button.disabled = true;
        }
    });