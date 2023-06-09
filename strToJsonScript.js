const data = `Student ID,First Name,Last Name,Email
1605092601799,Melvin,Levine,libero@ultricessitamet.co.uk
1627060401499,Elaine,Donaldson,Morbi.vehicula@imperdiet.ca
1699112687399,Roth,Hinton,lorem@Nullamscelerisque.net
1651061329999,Evelyn,Atkinson,tempus.eu@dolorelitpellentesque.com
1669031424299,Jackson,Gould,lorem@orci.com
1610122466699,Amena,Winters,eu.lacus@Uttincidunt.org
1660020239499,Giacomo,James,Duis.mi.enim@mi.com
1664110352499,Nathan,Moran,eget.lacus@erosNam.net
1683092555899,Vivian,Workman,fringilla@sagittis.net
1607102510699,Amal,Cervantes,aliquet@in.co.uk
1656061966999,Octavius,Wade,pede@mus.ca
1667081298699,Kenneth,Fletcher,in.consequat@dignissimtemporarcu.org
1697062419499,Malik,Silva,Suspendisse@commodo.com
1656081805699,Xanthus,Mcgowan,ridiculus.mus.Proin@Maurisvestibulum.org
1638092980799,Kay,Marquez,In@blanditviverraDonec.co.uk
1691091750799,Oleg,Koch,natoque.penatibus.et@Quisqueporttitor.com
1611010296699,Cathleen,Greene,semper@facilisisfacilisismagna.ca
1605031215599,Naomi,Ferguson,euismod.mauris@vulputateeu.net
1651092040799,Chadwick,Allen,enim@semper.co.uk
1611112931699,Jennifer,Stevenson,sollicitudin.adipiscing@Aenean.com
1688110873699,Brent,Mcneil,ac.arcu@Nuncsollicitudincommodo.net
1665101843499,Otto,Hart,elementum@Maurisvestibulum.org
1653062608899,Victor,Mcconnell,sem.Nulla@Quisque.co.uk
1695092204299,Branden,Morgan,Nulla.facilisis.Suspendisse@vitae.ca
1641010876399,Caryn,Reid,Aliquam.ornare.libero@adlitoratorquent.com
1609062069499,Wayne,Pennington,bibendum@metus.com
1687072131299,Xanthus,Massey,semper@odio.net
1611102284199,Ahmed,Galloway,eget.ipsum.Donec@laoreetlectusquis.co.uk
1691060523599,Willa,Wagner,at@interdumNuncsollicitudin.edu
1643020941699,Joy,Carey,scelerisque.lorem@dolordolortempus.ca`;

// Split the data by new lines
const lines = data.split("\n");

// Extract the header and remove leading/trailing whitespaces
const header = lines[0].split(",").map((item) => item.trim());

// Initialize an array to store the JSON objects
const jsonArray = [];

// Iterate over the lines starting from the second line
for (let i = 1; i < lines.length; i++) {
  const values = lines[i].split(",");

  // Create a new object
  const obj = {};

  // Assign values to corresponding keys from the header
  for (let j = 0; j < header.length; j++) {
    obj[header[j]] = values[j].trim();
  }

  // Add the object to the array
  jsonArray.push(obj);
}

// Convert the array to JSON string with indentation
const jsonString = JSON.stringify(jsonArray, null, 2);

// Print the JSON string
console.log(jsonString);
