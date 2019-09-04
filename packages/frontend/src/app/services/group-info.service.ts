import {Injectable} from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class GroupInfoService {

  private rgx = /^\s*(\d+)\s+(\w+)/;

  private groupNameRgx = /^([HBWJ])([FM])([OY])(ST|RI|BE|BU|MD|CG|PR|TR|PI|BB|CR|AP|CA|DK|CW|GO|LG|JG|SK|SH|TO)$/;

  constructor() {
  }

  public getInfo(name: string) {
    if (!this.groupNameRgx.test(name)) {
      return null;
    }


    let res: any = {};
    let [, race, gender, age, type] = name.match(this.groupNameRgx);

    switch (race) {
      case 'W':
        res.race = 'White';
        break;
      case 'B':
        res.race = 'Black';
        break;
      case 'H':
        res.race = 'Hispanic';
        break;
    }

    switch (gender) {
      case 'M':
        res.gender = 'Man';
        break;
      case 'F':
        res.gender = 'Woman';
        break;
    }

    switch (age) {
      case 'O':
        res.age = 'Old';
        break;
      case 'Y':
        res.age = 'Young';
        break;
    }

    switch (type) {
      case 'TO':
        res.type = 'TOurist';
        break;
      case 'BE':
        res.type = 'BEach';
        break;
      case 'PR':
        res.type = 'PRostitute';
        break;
      case 'RI':
        res.type = 'RIch';
        break;
      case 'GO':
        res.type = 'GOlf';
        break;
      case 'BU':
        res.type = 'BUsiness';
        break;
      case 'SH':
        res.type = 'SHopper';
        break;
      case 'TR':
        res.type = 'TRamp';
        break;
      case 'MD':
        res.type = 'MaiD';
        break;
      case 'CG':
        res.type = 'CiGar';
        break;
      case 'AP':
        res.type = 'AirPort';
        break;
      case 'CA':
        res.type = 'CAb driver';
        break;
      case 'DK':
        res.type = 'DocK worker';
        break;
      case 'CR':
        res.type = 'CRiminal';
        break;
      case 'PI':
        res.type = 'PImp';
        break;
      case 'BB':
        res.type = 'BeatBoxer';
        break;
      case 'ST':
        res.type = 'STreet';
        break;
      case 'CW':
        res.type = 'Construction Worker';
        break;
      case 'LG':
        res.type = 'LifeGuard';
        break;
      case 'JG':
        res.type = 'JoGging';
        break;
      case 'SK':
        res.type = 'SKate roller';
        break;
    }

    return res;
  }

  public isPedGroup(group) {

    let parts = group.split(/\s*,\s*/);

    return parts[0].split(/s*\/\s*/).some((e) => this.rgx.test(e));
  }

  public getImageURL(group) {
    if (this.isPedGroup) {
      let [, id, title] = group.match(this.rgx);

      id = id.replace(/^0+/, '');

      return `http://spaceeinstein.altervista.org/vcped/${id}.jpg`;
    }
  }
}
