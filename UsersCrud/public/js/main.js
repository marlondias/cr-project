
function fillVerticalGapFooter() {
    const screenH  = window.innerHeight;
    const bodyH = document.body.innerHeight;
    let gap = screenH - bodyH;

    if (gap > 0) {
        document.getElementById('footerBox').style.marginTop = gap + 'px';
        return;
    }
}

window.onresize = () => {
    //fillVerticalGapFooter();
};

