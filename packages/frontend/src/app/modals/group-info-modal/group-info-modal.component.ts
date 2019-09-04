import {Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-group-info-modal',
  templateUrl: './group-info-modal.component.html',
  styleUrls: ['./group-info-modal.component.sass']
})
export class GroupInfoModalComponent implements OnInit {

  private rgx = /^\s*(\d+)\s+(\w+)/;

  private groupNameRgx = /^([HBWJ])([FM])([OY])(ST|RI|BE|BU|MD|CG|PR|TR|PI|BB|CR|AP|CA|DK|CW|GO|LG|JG|SK|SH|TO)$/;

  public group: any;

  public info = null;

  constructor() {
  }

  ngOnInit() {
    let [, id, title] = this.group.title.match(this.rgx);

    this.info = this.getGroupInfo(title);
  }

  public getGroupInfo(name: string) {
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
        res.type = 'Tourist';
        break;
      case 'BE':
        res.type = 'Beach';
        break;
      case 'PR':
        res.type = 'Prostitute';
        break;
      case 'RI':
        res.type = 'Rich';
        break;
      case 'GO':
        res.type = 'Golf';
        break;
      case 'BU':
        res.type = 'Business';
        break;
      case 'SH':
        res.type = 'Shopper';
        break;
      case 'TR':
        res.type = 'Tramp';
        break;
      case 'MD':
        res.type = 'Maid';
        break;
      case 'CG':
        res.type = 'Cigar';
        break;
      case 'AP':
        res.type = 'Airport';
        break;
      case 'CA':
        res.type = 'Cab driver';
        break;
      case 'DK':
        res.type = 'Dock worker';
        break;
      case 'CR':
        res.type = 'Criminal';
        break;
      case 'PI':
        res.type = 'Pimp';
        break;
      case 'BB':
        res.type = 'Beatboxer';
        break;
      case 'ST':
        res.type = 'Street';
        break;
      case 'CW':
        res.type = 'Construction Worker';
        break;
      case 'LG':
        res.type = 'Lifeguard';
        break;
      case 'JG':
        res.type = 'Jogging';
        break;
      case 'SK':
        res.type = 'Skate roller';
        break;
    }

    return res;
  }

  public get isPedGroup() {
    let parts = this.group.title.split(/\s*,\s*/);

    return parts[0].split(/s*\/\s*/).some((e) => this.rgx.test(e));
  }

  public get imageUrl() {
    if (this.isPedGroup) {
      let [, id, title] = this.group.title.match(this.rgx);

      id = id.replace(/^0+/, '');

      return `http://spaceeinstein.altervista.org/vcped/${id}.jpg`;
    }
  }
}
