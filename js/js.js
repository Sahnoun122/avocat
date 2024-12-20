const modal = document.querySelector("#crud-modal");
let isclick = true;
let btn = function() {
    if (isclick == 1) {
        modal.style.display = "block";
        isclick = 0;
    } else {
        modal.style.display = "none";
        isclick = 1;
    }
}

const dueDate = document.getElementById('mindate');
        function mindate() {
          const today = new Date().toISOString().split('T')[0];
          dueDate.setAttribute('max', today);
      }

      mindate();

      const datemax= document.getElementById('maxdate');
        function maxdate() {
          const today = new Date().toISOString().split('T')[0];
          datemax.setAttribute('min', today);
      }

      maxdate();

