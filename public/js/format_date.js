function format_date(timestamp, type) {

	// Create a date object from the timestamp
	var date = new Date(timestamp);

	// Create a list of names for the months
	var months = [
    'Januari', 'Februari', 'Maret', 
    'April', 'Mei', 'Juni', 
    'Juli', 'Agustus', 'September', 
    'Oktober',	'November', 'Desember'];

	// return a formatted date
  if (type == 'Full')
  {
    return  date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear();
  } else if (type == 'MY') { 
    return  months[date.getMonth()] + ' ' + date.getFullYear();  
  } else if (type == 'd-m-Y') {
    let day = date.getDate();
    let bulan = (date.getMonth()+1);
    if (day<10) {
      day = '0' + day;
    }
    if (bulan<10) {
      bulan = '0' + bulan;
    }
    return  day + '-' + bulan + '-' + date.getFullYear();
  } else if (type == 'yyyy-mm-dd') {
    let day = date.getDate();
    let bulan = (date.getMonth()+1);
    if (day<10) {
      day = '0' + day;
    }
    if (bulan<10) {
      bulan = '0' + bulan;
    }
    return date.getFullYear() + '-' + bulan + '-' + day ;
  }

}
