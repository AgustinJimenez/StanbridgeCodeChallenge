export enum AttendanceSatusTypes {
  Present = 'present',
  Absent = 'absent'
}

export const AttendanceStatusOptions = [
  {
    title: 'Present',
    value: AttendanceSatusTypes.Present
  },
  {
    title: 'Absent',
    value: AttendanceSatusTypes.Absent
  }
]

export type StudentType = {
  id: number
  last_name: string
  first_name: string
  email: string
}

export type CourseAttendanceType = {
  id: number
  last_name: string
  first_name: string
  email: string
}
